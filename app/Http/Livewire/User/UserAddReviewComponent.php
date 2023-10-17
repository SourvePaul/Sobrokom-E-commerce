<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Review;
use Livewire\Component;
use App\Models\OrderItem;

class UserAddReviewComponent extends Component
{
    public $order_id;
    public $product_id;
    public $ratting;
    public $comment;

    protected $roles=[
        'rating'=>'required',
        'comment'=>'required',
    ];

    public function mount($id, $product_id) {
        $this->order_id=$id;
        $this->product_id=$product_id;
    }

    public function addReview(){
        $this->validate();
        $order=Order::find($this->order_id);
        $review=new Review();
        $review->order_id=$this->order_id;
        $review->user_id=$order->user_id;
        $review->product_id=$this->product_id;
        $review->ratting=$this->ratting;
        $review->comment=$this->comment;
        $review->save();
        $item=OrderItem::where('order_id', $this->order_id)->where('product_id', $this->product_id)->first();
        $item->rstatus='1';
        $item->rdate=Carbon::today();
        $item->save();
        session()->flash('msg','Review has been added successfully!');
    }

    public function render()
    {
        return view('livewire.user.user-add-review-component')->layout("layouts.base");
    }
}