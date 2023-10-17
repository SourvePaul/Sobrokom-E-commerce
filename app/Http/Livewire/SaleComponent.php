<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Product;


class SaleComponent extends Component
{
    use WithPagination;
    protected $listeners = ['refreshcomponent'=>'$refresh'];

    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public function mount() {
        
        $this->sorting='default';
        $this->pagesize=12;
        $this->min_price=10;
        $this->max_price=10000;
    }
    
    public function store($product_id, $product_name, $product_price) {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
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
        session()->flash('message', 'Product has been added to your Compare');
    }
    public function render()
    {
        if($this->sorting == '1') {
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('featured', '1')->where('sale_price', '>', '0')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'date'){
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('sale_price', '>', '0')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price') {
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('sale_price', '>', '0')->orderBy('sale_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('sale_price', '>', '0')->orderBy('sale_price','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'az') {
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('sale_price', '>', '0')->orderBy('name','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'za') {
            $products = Product::whereBetween('sale_price', [$this->min_price, $this->max_price])->where('sale_price', '>', '0')->orderBy('name','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('sale_price',[$this->min_price, $this->max_price])->where('sale_price', '>', '0')->paginate($this->pagesize);
        }
        
        // $products = Product::paginate(12);
        return view('livewire.sale-component', ['products' => $products])
                ->layout("layouts.base");
    }
}