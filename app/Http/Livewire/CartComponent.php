<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Coupon;
use App\Models\SaleOn;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    protected $listeners = ['refreshComponent'=> '$refresh'];
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $taxAfetrDiscount;
    public $country_id;
    public $shipping_charges;
    public $charges;

    public function updateCart() {
        return ;
    }
    
    public function increaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');  
    }

    public function decreaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destroy($rowId) {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Product has been removed for th Cart successfully!');
    }

    public function applyCouponCode() {
        $coupon = Coupon::where('name', $this->couponCode)
                    ->where('end', '>=', Carbon::today())
                    ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
                    ->first();
        
        if ($coupon) {
            session()->put('coupon', [ 
                'code'=> $coupon->name,
                'type'=> $coupon->type,
                'value' => $coupon->coupon_value,
                'cart_value' => $coupon->cart_value,
            ]); 
        }else {
            session()->flash('couponMsg', 'Coupon code in not valid');
        } 
        return;
    }

    public function applyShippingCharges() {

        //dd($this->country_id);
        $country = Country::find($this->country_id);

        //dd($country->shipping_charges);
        $this->shipping_charges = (Cart::instance('cart')->subtotal() + $country->charges);
        
        //dd($this->charges);
        //$this->shipping_charges=(Cart::instance('cart')->total()- $this->charges);
        //dd($this->charges);

        if($country) {
            session()->put('country', [
                'charges' => $this->shipping_charges,
            ]);
        }
        $this->charges = session()->get('country')['charges'];
    }
        
    public function calculateDiscount() {
        if(session()->has('coupon')) {
            if(session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            }  else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']);
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfetrDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfetrDiscount + $this->charges;
        }
    }

    public function removeCoupon() {
	    session()->forget('coupon');
    }

    public function checkout() {
	    if(Auth::check()) {
		    return redirect()->route('checkout');
        } else{
	        return redirect()->route('login');
        }
    }

    public function setAmountForCheckout() {
	    if(!Cart::instance('cart')->count() > 0) {
		    session()->forget('checkout');
		    return;
	    }
	    if(session()->has('coupon')) {
		    session()->put('checkout',[
			    'discount' => $this->discount,
			    'subtotal' => $this->subtotalAfterDiscount,
			    'tax' =>$this->taxAfetrDiscount,
			    'total' => ($this->totalAfterDiscount + $this->charges),
		    ]);
	    } else {
	        session()->put('checkout',[
			    'discount' => 0,
			    'subtotal' => Cart::instance('cart')->subtotal(),
			    'tax' => Cart::instance('cart')->tax(),
			    'total' => (Cart::instance('cart')->total() + $this->shipping_charges),
		    ]);
        }
    }

    public function render()
    {   
        if(session()->has('coupon')) {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
                session()->forget('country');
            } else{
                $this->calculateDiscount();
            }
        }

        $sale = SaleOn::find(1);
        $this->setAmountForCheckout();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        $countries = Country::all();
        return view('livewire.cart-component', ['countries' => $countries])
                    ->layout('layouts.base');
    }
}