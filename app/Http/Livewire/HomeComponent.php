<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\SaleOn;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class HomeComponent extends Component
{
    public $size='d';
    public $color='d';

    protected $listeners = ['refreshcomponent'=>'$refresh'];
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
        $categories = Category::inRandomOrder()->limit(10)->get();
        $products = Product::inRandomOrder()->limit(10)->get();
        $featuredProducts = Product::where("featured", '1')->inRandomOrder()->limit(8)->get();
        $popularProducts = Product::where("featured", '0')->inRandomOrder()->limit(8)->get();
        //dd($new_products)
        $new_products = Product::orderBy("id","desc")->inRandomOrder()->limit(8)->get();
        //Banners
        $banners = Banner::where('position', '0')->limit(3)->get();
        $banner2 = Banner::where('position', '1')->limit(2)->get();
        $slid = Banner::where('position', '2')->limit(1)->get();
        $slids = Banner::where('position', '4')->limit(1)->get();
        $sliderss = Banner::where('position', '5')->limit(1)->get();
        $slides = Banner::where('position', '6')->limit(1)->get();
        $blog_sliders = Banner::where('position', '7')->take(1)->get();
        $blog_slids = Banner::where('position', '7')->orderBy('id','desc')->take(2)->get();
        $sale = SaleOn::where('status','1')->first();
        $sproducts = Product::where('sale_price', '>', '0')->take(2)->get();

        //Brand
        $brands = Brand::orderBy("created_at","desc")->take(6)->get();

        //Blog
        $blogs = Blog::orderBy("created_at","desc")->take(2)->get();

        $home_cat = HomeCategory::find(2);

        if($home_cat){
            $cats = explode(',',$home_cat->categories);
            $no_of_products = $home_cat->products;
            $hcategories = Category::with(['products'=>function($query) use ($no_of_products){
                $query->take($no_of_products);
            }])->whereIn('id', $cats)->get();
        }
        
        return view('livewire.home-component', ['categories' => $categories,
         'products' => $products,
          'featuredProducts' => $featuredProducts,
           'popularProducts' => $popularProducts,
            'new_products' => $new_products,
             'banners' => $banners,
              'banner2' => $banner2,
               'slid' => $slid,
                'slids' => $slids,
                 'sliderss' => $sliderss,
                  'slides' => $slides,
                   'blog_sliders' => $blog_sliders,
                      'brands' => $brands,
                       'blogs' => $blogs,
                        'blog_slids' => $blog_slids,
                        'sale' => $sale,
                         'sproducts' => $sproducts, 
                         'hcategories'=>$hcategories])->layout("layouts.base");
        
    }
}