<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\SaleOn;
use App\Models\Product;
use Livewire\Component;

class ProductDetailComponent extends Component
{
    public $p_slug;
    public $size = 'M';
    public $color = 'White';

    public function mount($slug) {
        $this->p_slug = $slug;
    }

    public function store($product_id, $product_name, $product_price) {
        
        $options=[
            'size'=>$this->size,
            'color'=>$this->color,
        ];

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price, $options)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Product has been added to your Cart');
    }

    public function wishlist($product_id, $product_name, $product_price) {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('message', 'Product has been added to your Wishlist');
    }

    public function compare($product_id, $product_name, $product_price, $product_stock) {
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price, $product_stock)->associate('App\Models\Product');
        $this->emitTo('compare-count-component', 'refreshComponent');
    }
    
    // public function increaseQuantity($rowId) {
    //     $product = Cart::instance('cart')->get($rowId);
    //     $qty = $product->qty + 1;
    //     Cart::instance('cart')->update($rowId, $qty);
    //     $this->emitTo('cart-component', 'refreshComponent');
    //     $this->emitTo('cart-count-component', 'refreshComponent');  
    // }

    // public function decreaseQuantity($rowId) {
    //     $product = Cart::instance('cart')->get($rowId);
    //     $qty = $product->qty - 1;
    //     Cart::instance('cart')->update($rowId, $qty);
    //     $this->emitTo('cart-component', 'refreshComponent');
    //     $this->emitTo('cart-count-component', 'refreshComponent');
    // }

    public function render()
    {
        $sale = SaleOn::where('status','1')->first();
        $product = Product::where('slug',$this->p_slug)->first();
        $related = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.product-detail-component', ['product'=>$product, 'related'=>$related, 'sale' => $sale])
        ->layout("layouts.base");
    }
}