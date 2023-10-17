<?php

namespace App\Http\Livewire;

use Cart;
use Stripe;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transcation;
use Illuminate\Support\Facades\Auth;
// use App\Mail\OrderMail;
// use Illuminate\Support\Facades\Mail;


class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $address1;
    public $address2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $paymentmode;
    public $thankyou;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_address1;
    public $s_address2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;
    public $card_no;
    public $exp_year;
    public $cvc;
    public $product_id;
    public $supplier_id;


    public function update($propertyName) {
        $this->validateOnly($propertyName, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->ship_to_different) {
            $this->validateOnly($propertyName, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required',
                's_address1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
                's_paymentmode' => 'required',
            ]);
        }

        if($this->paymentmode == 'card') {
            $this->validateOnly($propertyName, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
    }

    public function placeOrder() {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->paymentmode == 'card') {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->shipping_charges = (session()->get('checkout')['total']) - (session()->get('checkout')['subtotal'] + session()->get('checkout')['tax']);	
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->address1 = $this->address1;
        $order->address2 = $this->address2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'pending';
        $order->is_shipping_different = $this->ship_to_different ? '1' : '0';
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $product = Product::find($item->id);
            
            $orderItem->product_id = $item->id;
            //$orderItem->vendor_id = $item->model->user_id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->qty = $item->qty;
            $orderItem->color = $item->options->color;
            $orderItem->size = $item->options->size;
            $product->quantity = $product->quantity - $item->qty;
            $product->sale_quantity = $product->sale_quantity + $item->qty;
            $orderItem->save();
            $product->save();
        }

        if($this->ship_to_different){
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required',
                's_address1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->address1 = $this->s_address1;
            $shipping->address2 = $this->s_address2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->order_id = $order->id;
            //$shipping->product_id = $item->id;
            $shipping->save();
        }

        if($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetcart();
        }
        elseif($this->paymentmode == 'card'){
            $stripe = Stripe::make(env('STRIPE_KEY'));
        
            try{
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc,
                    ]
                ]);

                if(!isset($token['id'])) {
                    session()->flash('message', 'Your Input card information is not valid');
                    $this->thankyou = 0;
                }
                $customer = $stripe->customer()->create([
                    'name' => $this->firstname . ' ' . $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->address1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country,
                    ],
                    'shipping' => [
                        'name' => $this->firstname . '' . $this->lastname,
                        'address' => [
                            'line1' => $this->address1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country,
                        ],
                    ],
                    'source' => $token['id'],
                ]);

                $change = $stripe->changes()->create([
                    'customer' => $customer['id'],
                    'currency' => 'BDT',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order number' . $order->id,
                ]);
                if($change['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetcart();
                }else {
                    session()->flash('message','Error in transaction');
                    $this->thankyou = 0;
                }
            }  catch(\Exception $e) {
                session()->flash('message', $e->getMessage());
                $this->thankyou = 0;
            } 
        }
        //$this->orderConfirmationMail($order);
    }

    public function resetcart() {
        $this->thankyou = 1;
        Cart::instance('cart')->destory();
        session()->forget('country');
        session()->forget('checkout');
    }
    public function makeTransaction($order_id, $status) {
        $transaction = new Transcation();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        // $transaction->subtotal = Cart::instance('cart')->subtotal();
        // $transaction->tax = Cart::instance('cart')->tax();
        $transaction->total = Cart::instance('cart')->total();
        $transaction->save();
    }

    public function orderConfirmationMail($order) {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifiyForCheckpout() {
        if(!Auth::check()) {
            return redirect()->route('login');
        }else if($this->thankyou) {
            return redirect()->route('thankyou');
        }else if(!session()->get('checkout')) {
            return redirect()->route('cart');
        }
    }

    public function render()
    {
        $this->verifiyForCheckpout();
        return view('livewire.checkout-component')
            ->layout('layouts.base');
    }
}