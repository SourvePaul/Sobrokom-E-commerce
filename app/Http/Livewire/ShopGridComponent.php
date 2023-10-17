<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class ShopGridComponent extends Component
{

    use WithPagination;
    protected $listeners = ['refreshcomponent'=>'$refresh'];

    public $sorting;
    public $pagesize;
    public $new;
    public $used;
    public $refurnished;
    public $min_price;
    public $max_price;
    public $size = 'd';
    public $color = 'd';
    public function mount() {
        
        $this->sorting='default';
        $this->pagesize=12;
        $this->min_price = 10;
        $this->max_price = 10000;
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

        $options=[
            'size'=>$this->size,
            'color'=>$this->color,
        ];
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price, $options)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('message', 'Product has been added to your Wishlist');
    }

    public function compare($product_id, $product_name, $product_price, $product_stock) {

        $options=[
            'size'=>$this->size,
            'color'=>$this->color,
        ];
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price, $product_stock, $options)->associate('App\Models\Product');
        $this->emitTo('compare-count-component', 'refreshComponent');
        session()->flash('message', 'Product has been added to your Compare');
    }
    public function render()
    {
        if($this->sorting == '1') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('featured', '1')->orderBy('created_at','DESC')
                                ->paginate($this->pagesize)->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished);
        }
        elseif($this->sorting == 'date'){
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished)
                                ->orderBy('created_at', 'DESC')
                                ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished)
                                ->orderBy('price', 'ASC')
                                ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished)
                                ->orderBy('price', 'DESC')
                                ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'az') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished)
                                ->orderBy('name', 'ASC')
                                ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'za') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type',$this->new)
                                ->where('product_type',$this->used)
                                ->where('product_type',$this->refurnished)
                                ->orderBy('name', 'DESC')
                                ->paginate($this->pagesize);
        } elseif($this->new || $this->used || $this->refurnished) {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                                ->where('product_type', 'like', '%' .$this->new. '%')
                                ->where('product_type', 'like', '%' .$this->used. '%')
                                ->where('product_type', 'like', '%' .$this->refurnished. '%')
                                ->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('price',[$this->min_price, $this->max_price])
                                ->paginate($this->pagesize);
        }

        // $products = Product::paginate(12);
        return view('livewire.shop-grid-component', ['products' => $products])
        ->layout('layouts.base');
    }
}