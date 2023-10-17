<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    use WithPagination;
    public $order_id;
    public $email;

    protected $rules=[
        'order_id'=> 'required|integer',
        'email'=> 'required|email',
    ];

    public function trackOrder() {
        
        $this->validate();
        $status = Order::where('id', $this->order_id)->where('email', $this->email)->first();
        
        if($status){
            session()->flash('status', "Your Order Status $status->status");
        }
        else {
            session()->flash('status', "Your Order information is not correct!");
        }
        //return view('livewire.user.user-dashboard-component',['status'=>$status])->layout("layouts.base");
    }
    
    public function render()
    {
        $cost = Order::where('user_id', Auth::user()->id)->sum('total');
        $today_cost = Order::where('user_id', Auth::user()->id)->where('created_at', Carbon::today())->sum('total');
        $today_orders = Order::where('user_id', Auth::user()->id)->where('created_at', Carbon::today())->count();
        $totalOrders = Order::where('user_id', Auth::user()->id)->count();
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id','DESC')->take(10)->get();
        return view('livewire.user.user-dashboard-component', ['orders'=>$orders,
         'cost'=>$cost,
          'totalOrders'=>$totalOrders,
           'today_cost'=> $today_cost,
            'today_orders' => $today_orders])
                    ->layout("layouts.base");
    }
}