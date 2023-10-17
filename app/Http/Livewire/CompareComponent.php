<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CompareComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function store($product_id, $product_name, $product_price, $product_stock) {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price, $product_stock);
        $this->emitTo('compare-component', 'refreshComponent');
    }
    public function render()
    {
        return view('livewire.compare-component')
            ->layout('layouts.base');
    }
}