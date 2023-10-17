<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class SearchComponent extends Component
{
    public $search;
    public $category_id;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public function mount() {
        
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->min_price = 10;
        $this->max_price = 10000;
        $this->fill(request()->only('search', 'category_id'));
    }
    public function render()
    {

        if($this->sorting == '1') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->where('featured', '1')
                        ->orderBy('created_at','DESC')
                        ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'date'){
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->orderBy('price', 'ASC')
                        ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->orderBy('price', 'DESC')
                        ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'az') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'za') {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('price',[$this->min_price, $this->max_price])
                        ->where('category_id', 'LIKE', '%'.$this->category_id .'%')
                        ->where('name', 'LIKE','%'.$this->search.'%')
                        ->paginate($this->pagesize);
        }

        return view('livewire.search-component', ['products' => $products])
            ->layout("layouts.base");
    }
}