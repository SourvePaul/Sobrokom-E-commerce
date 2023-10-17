<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartCountComponent extends Component
{

    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function destroy($rowId) {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        
    }
    public function render()
    {
        return <<<'blade'
            <div class="header-action-icon-2">
            @if(Cart::instance('cart')->count() > 0)
                <a class="mini-cart-icon" href="{{ route('cart') }}">
                    <img alt="Sobrokom" src="{{ asset('assets/images/icon-cart.svg') }}">
                    <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
                </a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                    <ul>
                        @foreach(Cart::instance('cart')->content() as $item)
                            <li>
                                <div class="shopping-cart-img">
                                    <a href="#"><img alt="Sobrokom" src="{{ asset('assets/images/product')}}/{{$item->model->front_image}}"></a>
                                </div>
                                <div class="shopping-cart-title">
                                    <h4><a href="#">{{$item->name}}</a></h4>
                                    <h4><span>{{$item->qty}} × </span>${{$item->price}}</h4>
                                </div>
                                <div class="shopping-cart-delete">
                                    <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fa fa-trash"></i></a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="shopping-cart-footer">
                        <div class="shopping-cart-total">
                            <h4>Total <span>${{Cart::total()}}</span></h4>
                        </div>
                        <div class="shopping-cart-button">
                            <a href="{{ route('cart') }}" class="outline">View cart</a>
                            <a href="{{ route('checkout') }}">Checkout</a>
                        </div>
                    </div>
                </div>
                @else 
                <a class="mini-cart-icon" href="{{ route('cart') }}">
                    <img alt="Sobrokom" src="{{ asset('assets/images/icon-cart.svg') }}">
                    <span class="pro-count blue">0</span>
                </a>
                @endif
            </div>
        blade;
    }
}