<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return <<<'blade'
            <div class="header-action-icon-2">
                @if(Cart::instance('wishlist')->count() > 0)
                <a href="{{ route('wishlist') }}">
                    <img class="svgInject" alt="Sobrokom" src="{{ asset('assets/images/icon-heart.svg') }}">
                    <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
                </a>
                @else 
                <a href="#">
                    <img class="svgInject" alt="Sobrokom" src="{{ asset('assets/images/icon-heart.svg') }}">
                    <span class="pro-count blue">0</span>
                </a>
                @endif
            </div>
        blade;
    }
}