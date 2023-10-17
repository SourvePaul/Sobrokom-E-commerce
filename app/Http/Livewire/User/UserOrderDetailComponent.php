<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class UserOrderDetailComponent extends Component
{

    public $order_id;
    public function mount($id) {
        $this->order_id = $id;
    }

    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = 'cancel';
        $order->cancel_date = Carbon::today();
        $order->save();
        session()->flash('msg', 'Your order has been canceled successfully');
    }
    
    public function render()
    {
        $order=Order::find($this->order_id);
        return view('livewire.user.user-order-detail-component', ['order'=>$order])->layout("layouts.base");
    }
}