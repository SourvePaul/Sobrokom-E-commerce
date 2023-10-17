<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Order;

class AdminDashboardComponent extends Component
{

    use WithPagination;
    
    public function render()
    {
        $products = Product::where('quantity',20)->paginate(12);
        $users = User::where('utype','USR')->get();
        $orders = Order::all();
        $sale = Order::sum('total');
        $ords=Order::paginate(12);

        return view('livewire.admin.admin-dashboard-component',['users'=>$users,
         'products'=>$products,
          'orders'=> $orders,
           'sale'=>$sale,
            'ords'=>$ords])
                    ->layout('layouts.admin');
    }
}