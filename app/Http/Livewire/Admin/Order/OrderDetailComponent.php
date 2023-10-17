<?php

namespace App\Http\Livewire\Admin\Order;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\Transcation;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class OrderDetailComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $order_id;

    public function mount($id) {
        $this->order_id = $id;
    }

    public function changeStatus($id, $status) {
        $order = Order::find($id);
        if($status=== 'cancel'){
            $order->status=$status;
            $order->cancel_date = Carbon::today();
        }elseif($status=== 'delivered'){
            $order->status=$status;
            $order->delivery_date = Carbon::today();
            $transcation = Transcation::where('order_id',$id)->first();
            $transcation->status = 'paid';
            $transcation->save();
        }else{
            $order->status=$status;
        }
        $order->save();
        $this->alert('success', 'Status has been updated successfully!');
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.order.order-detail-component', ['order'=>$order])->layout('layouts.admin');
    }
}