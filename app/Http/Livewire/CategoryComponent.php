<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class CategoryComponent extends Component
{
    use WithPagination;
    protected $listeners = ['refreshcomponent'=>'$refresh'];

    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;

    public $category_slug;
    public function mount($slug) {
        
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->min_price = 10;
        $this->max_price = 10000;
        $this->category_slug = $slug;
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

        $category=Category::where('slug', $this->category_slug)->first();

        if($this->sorting == '1') {
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->where('featured', '1')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'date'){
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price') {
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'az') {
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('name', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'za') {
            $products = Product::where('category_id', $category->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('name', 'DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::where('category_id', $category->id)->whereBetween('price',[$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        return view('livewire.category-component', ['products' => $products])
            ->layout("layouts.base");
    }
}