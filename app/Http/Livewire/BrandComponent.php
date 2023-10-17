<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Cart;

class BrandComponent extends Component
{
    use WithPagination;
    protected $listeners = ['refreshcomponent'=>'$refresh'];

    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;

    public $brand_id;
    public function mount($id) {
        
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->min_price = 10;
        $this->max_price = 10000;
        $this->brand_id = $id;
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

        //$brand = Brand::find($this->brand_id);
        $brand = Brand::where('id', $this->brand_id)->first();

        if($this->sorting == '1') {
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->where('featured', '1')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'date'){
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price') {
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'az') {
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('name', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'za') {
            $products = Product::where('brand_id', $brand->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('name', 'DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::where('brand_id', $brand->id)->whereBetween('price',[$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        
        return view('livewire.brand-component', ['products' => $products])->layout("layouts.base");
    }
}