<main class="main" wire:ignore>
    <section class="home-slider position-relative pt-25 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="position-relative">
                        <div class="hero-slider-1 style-3 dot-style-1 dot-style-1-position-1">
                            @foreach ($banners as $banner)
                            <div class="single-hero-slider single-animation-wrap">
                                <div class="container">
                                    <div class="slider-1-height-3 slider-animated-1">
                                        <div class="hero-slider-content-2">
                                            <h4 class="animated">{{$banner->title}}</h4>
                                            {{-- <h2 class="animated fw-900">Supper Value Deals</h2>
                                            <h1 class="animated fw-900 text-brand">On All Products</h1> --}}
                                            <p class="animated">{{$banner->subtitle}}</p>
                                            <a class="animated btn btn-success btn-success-3" href="{{$banner->link}}"> Shop Now </a>
                                        </div>
                                        <div class="slider-img">
                                            <img src="{{ asset('assets/images')}}/{{$banner->image}}" alt="{{$banner->title}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow style-3"></div>
                    </div>
                </div>
                <div class="col-lg-3 d-md-none d-lg-block">
                    @forelse($banner2 as $slider)
                        <div class="banner-img banner-1 wow fadeIn  animated home-3">
                            <img class="border-radius-10" src="{{ asset('assets/images') }}/{{$slider->image}}" alt="{{$slider->title}}">
                            <div class="banner-text">
                                <span>{{$slider->title}}</span>
                                <h4>{{nl2br($slider->subtitle)}}</h4>
                                <a href="{{$slider->link}}" class="btn btn-success btn-sm">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @empty
                        <div class="banner-img banner-1 wow fadeIn  animated home-3">
                            <img class="border-radius-10" src="{{asset('assets/images/banner-5.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Accessories</span>
                                <h4>Save 17% on <br>Autumn Hat</h4>
                                <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="banner-img banner-2 wow fadeIn  animated mb-0">
                            <img class="border-radius-10" src="{{asset('assets/images/banner-7.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Eardrop</h4>
                                <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-4.png" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up animated">
                        <img src="assets/images/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding wow fadeIn animated"  >
        <div class="container" wire:ignore>
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist" wire:ignore>
                    @foreach ($hcategories as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-{{$category->id}}" data-bs-toggle="tab" data-bs-target="#tab-{{$category->id}}" type="button" role="tab" aria-controls="tab-one" aria-selected="true">{{$category->name}}</button>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('shop')}}" class="view-more d-none d-md-flex">View More<i class="fa fa-angle-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent" >
                @foreach ($hcategories as $category)
                <div class="tab-pane fade show active" id="tab-{{$category->id}}" role="tabpanel" aria-labelledby="tab-{{$category->id}}" wire:ignore >
                    <div class="row product-grid-4">
                        @foreach ( $category->products as $product)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product-detail',['slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/images/product') }}/{{$product->front_image}}" alt="{{$product->slug}}">
                                                <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$product->back_image}}" alt="{{$product->slug}}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModalf-{{$product->id}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}','{{$product->name}}', {{$product->price}})">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}','{{$product->name}}', '{{$product->price}}', {{$product->stock}})">
                                                <i class="fa fa-random"></i>
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Featured</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{ $product->category->name }}</a>
                                        </div>
                                        <h2><a href="{{route('product-detail',['slug'=>$product->slug])}}">{{ $product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547; {{ $product->price }} </span>
                                            {{-- <span class="old-price">&#2547; 245</span> --}}
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$product->id}}','{{$product->name}}', {{$product->price}})">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" id="quickViewModalf-{{$product->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close bg-dark text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-gallery">
                                                        <span class="zoom-icon"><i class="fa fa-search"></i></span>
                                                        <!-- MAIN SLIDES -->
                                                        <div class="product-image-slider">
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}">
                                                            </figure>
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}">
                                                            </figure>
                                                        </div>
                                                        <!-- THUMBNAILS -->
                                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}">
                                                            </div>
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Gallery -->
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li><strong class="mr-10">Share this:</strong></li>
                                                            <li class="social-facebook">
                                                                <a href="#"><img src="{{ asset('assets/images/icon-facebook.svg') }}" alt=""></a>
                                                            </li>
                                                            <li class="social-twitter">
                                                                <a href="#"><img src="{{ asset('assets/images/icon-twitter.svg') }}" alt=""></a>
                                                            </li>
                                                            <li class="social-instagram">
                                                                <a href="#"><img src="{{ asset('assets/images/icon-instagram.svg') }}" alt=""></a>
                                                            </li>
                                                            <li class="social-linkedin">
                                                                <a href="#"><img src="{{ asset('assets/images/icon-pinterest.svg') }}" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-info">
                                                        <h3 class="title-detail mt-30">{{$product->name}}</h3>
                                                        <div class="product-detail-rating">
                                                            <div class="pro-details-brand">
                                                                <span style="display:flex;flex-direction:row;"> Brands: <a href="{{route('brand', ['id'=>$product->brand->id])}}"><img src="{{asset('assets/images/brand')}}/{{$product->brand->logo}}" style="width:90px;border-radius:91px;padding:2px;margin-left:5px;"></a></span>
                                                            </div>
                                                            <div class="product-rate-cover text-end">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix product-price-cover">
                                                            <div class="product-price primary-color float-left">
                                                                <ins><span class="text-brand">&#2547; {{$product->price}}</span></ins>
                                                                {{-- <ins><span class="old-price font-md ml-15">&#2547; 200</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                                            </div>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                        <div class="short-desc mb-30">
                                                            <p class="font-sm">{{$product->short_description}}!</p>
                                                        </div>

                                                        <div class="attr-detail attr-color mb-15">
                                                            <strong class="mr-10">Color</strong>
                                                            @foreach($product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->color}}" name="color" value="{{$attribute->color}}" {{old('color') == '$attribute->color' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->color}}">{{$attribute->color}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="attr-detail attr-size">
                                                            <strong class="mr-10">Size</strong>
                                                            @foreach($product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->size}}" name="size" value="{{$attribute->size}}" {{old('size') == '$attribute->size' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->size}}">{{$attribute->size}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                        @if(Session::has('message'))
                                                            <div class="alert alert-info text-dark">{{Session::get('message')}}</div>
                                                        @endif
                                                        <div class="detail-extralink">
                                                            {{-- <div class="detail-qty border radius">
                                                                <a href="#" class="qty-down"><i class="fa fa-angle-small-down"></i></a>
                                                                <span class="qty-val">1</span>
                                                                <a href="#" class="qty-up"><i class="fa fa-angle-small-up"></i></a>
                                                            </div> --}}
                                                            
                                                            <div class="product-extra-link2">
                                                                <button type="button" class="button button-add-to-cart" wire:click.prevent="store('{{$product->id}}','{{$product->name}}', {{$product->price}})">Add to cart</button>
                                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}','{{$product->name}}', {{$product->price}})"><i class="fa fa-heart"></i></a>
                                                                <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}','{{$product->name}}', '{{$product->price}}', {{$product->stock}})"><i class="fa fa-random"></i></a>
                                                            </div>
                                                        </div>
                                                        <ul class="product-meta font-xs color-grey mt-50">
                                                            <li class="mb-5">SKU: <a href="#">{{$product->SKU}}</a></li>
                                                            <li class="mb-5">Tags: <a href="#" rel="tag">{{$product->category->name}}</a></li>
                                                            <li>Availability:<span class="in-stock text-success ml-5">{{$product->quantity}} {{$product->stock}}</span></li>
                                                        </ul>
                                                    </div>
                                                    <!-- Detail Info -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                @endforeach
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two" wire:ignore >
                    <div class="row product-grid-4">
                        @foreach ($popularProducts as $p_product)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product-detail',['slug'=>$p_product->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/images/product') }}/{{$p_product->back_image}}" alt="{{$p_product->slug}}" >
                                                <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$p_product->back_image}}" alt="{{$p_product->slug}}" >
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModalp-{{$p_product->id}}"><i class="fa fa-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" 
                                            wire:click.prevent="wishlist('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})"><i class="fa fa-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" 
                                            wire:click.prevent="compare('{{$p_product->id}}','{{$p_product->name}}', '{{$p_product->price}}', {{$p_product->stock}})"><i class="fa fa-random"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Popular</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{ $p_product->category->name}} </a>
                                        </div>
                                        <h2><a href="{{route('product-detail',['slug'=>$p_product->slug])}}">{{ $p_product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547; {{ $p_product->price }}</span>
                                            {{-- <span class="old-price">&#2547; 245</span> --}}
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" id="quickViewModalp-{{$p_product->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close bg-dark text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-gallery">
                                                        <span class="zoom-icon"><i class="fa fa-search"></i></span>
                                                        <!-- MAIN SLIDES -->
                                                        <div class="product-image-slider">
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$p_product->front_image}}" alt="{{$p_product->slug}}">
                                                            </figure>
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$p_product->back_image}}" alt="{{$p_product->slug}}">
                                                            </figure>
                                                        </div>
                                                        <!-- THUMBNAILS -->
                                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$p_product->front_image}}" alt="{{$p_product->slug}}">
                                                            </div>
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$p_product->back_image}}" alt="{{$p_product->slug}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Gallery -->
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li><strong class="mr-10">Share this:</strong></li>
                                                            <li class="social-facebook"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-facebook.svg') }}" alt=""></a></li>
                                                            <li class="social-twitter"> <a href="#"><img
                                                                        src="{{ asset('assets/images/icon-twitter.svg') }}" alt=""></a></li>
                                                            <li class="social-instagram"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-instagram.svg') }}" alt=""></a></li>
                                                            <li class="social-linkedin"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-pinterest.svg') }}" alt=""></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-info">
                                                        <h3 class="title-detail mt-30">{{$p_product->name}}</h3>
                                                        <div class="product-detail-rating">
                                                            <div class="pro-details-brand">
                                                                <span style="display:flex;flex-direction:row;">
                                                                     Brands: 
                                                                     <a href="{{route('brand', ['id'=>$p_product->brand->id])}}">
                                                                        <img src="{{asset('assets/images/brand')}}/{{$p_product->brand->logo}}" style="width:90px;border-radius:91px;padding:2px;margin-left:5px;">
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div class="product-rate-cover text-end">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix product-price-cover">
                                                            <div class="product-price primary-color float-left">
                                                                <ins><span class="text-brand">&#2547; {{$p_product->price}}</span></ins>
                                                                {{-- <ins><span class="old-price font-md ml-15">&#2547; 200</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                                            </div>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                        <div class="short-desc mb-30">
                                                            <p class="font-sm">{{$p_product->short_description}}!</p>
                                                        </div>

                                                        <div class="attr-detail attr-color mb-15">
                                                            <strong class="mr-10">Color</strong>
                                                            @foreach($p_product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->color}}" name="color" value="{{$attribute->color}}" {{old('color') == '$attribute->color' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->color}}">{{$attribute->color}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="attr-detail attr-size">
                                                            <strong class="mr-10">Size</strong>
                                                            @foreach($p_product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->size}}" name="size" value="{{$attribute->size}}" {{old('size') == '$attribute->size' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->size}}">{{$attribute->size}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                        @if(Session::has('message'))
                                                            <div class="alert alert-info text-dark">{{Session::get('message')}}</div>
                                                        @endif
                                                        <div class="detail-extralink">
                                                            {{-- <div class="detail-qty border radius">
                                                                <a href="#" class="qty-down"><i class="fa fa-angle-small-down"></i></a>
                                                                <span class="qty-val">1</span>
                                                                <a href="#" class="qty-up"><i class="fa fa-angle-small-up"></i></a>
                                                            </div> --}}
                                                            
                                                            <div class="product-extra-link2">
                                                                <button type="button" class="button button-add-to-cart" wire:click.prevent="store('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})">Add to cart</button>
                                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})"><i class="fa fa-heart"></i></a>
                                                                <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$p_product->id}}','{{$p_product->name}}', '{{$p_product->price}}', {{$p_product->stock}})"><i class="fa fa-random"></i></a>
                                                            </div>
                                                        </div>
                                                        <ul class="product-meta font-xs color-grey mt-50">
                                                            <li class="mb-5">SKU: <a href="#">{{$p_product->SKU}}</a></li>
                                                            <li class="mb-5">Tags: <a href="#" rel="tag">{{$p_product->category->name}}</a></li>
                                                            <li>Availability:<span class="in-stock text-success ml-5">{{$p_product->quantity}} {{$p_product->stock}}</span></li>
                                                        </ul>
                                                    </div>
                                                    <!-- Detail Info -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three" wire:ignore >
                    <div class="row product-grid-4">
                        @foreach($new_products as $n_product)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product-detail',['slug'=>$n_product->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/images/product') }}/{{$n_product->front_image}}" alt="{{$n_product->slug}}" >
                                                <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$n_product->back_image}}" alt="{{$n_product->slug}}" >
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModaln-{{$n_product->id}}"><i class="fa fa-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})"><i class="fa fa-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$n_product->id}}','{{$n_product->name}}', '{{$n_product->price}}', {{$n_product->stock}})"><i class="fa fa-random"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{ $n_product->category->name }}</a>
                                        </div>
                                        <h2><a href="{{route('product-detail',['slug'=>$n_product->slug])}}">{{ $n_product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547; {{ $n_product->price }} </span>
                                            {{-- <span class="old-price">&#2547; 245</span> --}}
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" id="quickViewModaln-{{$n_product->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close bg-dark text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-gallery">
                                                        <span class="zoom-icon"><i class="fa fa-search"></i></span>
                                                        <!-- MAIN SLIDES -->
                                                        <div class="product-image-slider">
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$n_product->front_image}}" alt="{{$n_product->slug}}">
                                                            </figure>
                                                            <figure class="border-radius-10">
                                                                <img src="{{ asset('assets/images/product')}}/{{$n_product->back_image}}" alt="{{$n_product->slug}}">
                                                            </figure>
                                                        </div>
                                                        <!-- THUMBNAILS -->
                                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$n_product->front_image}}" alt="{{$n_product->slug}}">
                                                            </div>
                                                            <div><img src="{{ asset('assets/images/product')}}/{{$n_product->back_image}}" alt="{{$n_product->slug}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Gallery -->
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li><strong class="mr-10">Share this:</strong></li>
                                                            <li class="social-facebook"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-facebook.svg') }}" alt=""></a></li>
                                                            <li class="social-twitter"> <a href="#"><img
                                                                        src="{{ asset('assets/images/icon-twitter.svg') }}" alt=""></a></li>
                                                            <li class="social-instagram"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-instagram.svg') }}" alt=""></a></li>
                                                            <li class="social-linkedin"><a href="#"><img
                                                                        src="{{ asset('assets/images/icon-pinterest.svg') }}" alt=""></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="detail-info">
                                                        <h3 class="title-detail mt-30">{{$n_product->name}}</h3>
                                                        <div class="product-detail-rating">
                                                            <div class="pro-details-brand">
                                                                <span style="display:flex;flex-direction:row;"> Brands: <a href="{{route('brand', ['id'=>$n_product->brand->id])}}"><img src="{{asset('assets/images/brand')}}/{{$n_product->brand->logo}}" style="width:90px;border-radius:91px;padding:2px;margin-left:5px;"></a></span>
                                                            </div>
                                                            <div class="product-rate-cover text-end">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix product-price-cover">
                                                            <div class="product-price primary-color float-left">
                                                                <ins><span class="text-brand">&#2547; {{$n_product->price}}</span></ins>
                                                                {{-- <ins><span class="old-price font-md ml-15">&#2547; 200</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                                            </div>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                        <div class="short-desc mb-30">
                                                            <p class="font-sm">{{$n_product->short_description}}!</p>
                                                        </div>

                                                        <div class="attr-detail attr-color mb-15">
                                                            <strong class="mr-10">Color</strong>
                                                            @foreach($n_product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->color}}" name="color" value="{{$attribute->color}}" {{old('color') == '$attribute->color' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->color}}">{{$attribute->color}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="attr-detail attr-size">
                                                            <strong class="mr-10">Size</strong>
                                                            @foreach($n_product->attributes as $attribute)
                                                            <input type="radio" id="{{$attribute->size}}" name="size" value="{{$attribute->size}}" {{old('size') == '$attribute->size' ? 'checked' : '' }}>
                                                                <label for="{{$attribute->size}}">{{$attribute->size}}</label>
                                                            @endforeach
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                        @if(Session::has('message'))
                                                            <div class="alert alert-info text-dark">{{Session::get('message')}}</div>
                                                        @endif
                                                        <div class="detail-extralink">
                                                            {{-- <div class="detail-qty border radius">
                                                                <a href="#" class="qty-down"><i class="fa fa-angle-small-down"></i></a>
                                                                <span class="qty-val">1</span>
                                                                <a href="#" class="qty-up"><i class="fa fa-angle-small-up"></i></a>
                                                            </div> --}}
                                                            
                                                            <div class="product-extra-link2">
                                                                <button type="button" class="button button-add-to-cart" wire:click.prevent="store('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})">Add to cart</button>
                                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})"><i class="fa fa-heart"></i></a>
                                                                <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$n_product->id}}','{{$n_product->name}}', '{{$n_product->price}}', {{$n_product->stock}})"><i class="fa fa-random"></i></a>
                                                            </div>
                                                        </div>
                                                        <ul class="product-meta font-xs color-grey mt-50">
                                                            <li class="mb-5">SKU: <a href="#">{{$n_product->SKU}}</a></li>
                                                            <li class="mb-5">Tags: <a href="#" rel="tag">{{$n_product->category->name}}</a></li>
                                                            <li>Availability:<span class="in-stock text-success ml-5">{{$n_product->quantity}} {{$n_product->stock}}</span></li>
                                                        </ul>
                                                    </div>
                                                    <!-- Detail Info -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            @forelse ( $slid as $slidr)
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{ asset('assets/images') }}/{{$slidr->image}}" alt="{{$slidr->title}}">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">{{$slidr->title}}</h4>
                        <h1 class="fw-600 mb-20">{{$slidr->subtitle}}</h1>
                        <a href="{{$slidr->link}}" class="btn btn-success">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="assets/images/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop-grid-right.html" class="btn">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
    <section class="popular-categories section-padding mt-15">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($categories as $category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="#"><img src="{{ asset('assets/images/category') }}/{{$category->logo}}" alt="{{ $category->slug }}"></a>
                        </figure>
                        <h5><a href="#">{{ $category->name }}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/images/banner-1.png" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/images/banner-2.png" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="assets/images/banner-3.png" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-25 pb-20">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($products as $product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product-detail',['slug'=>$product->slug])}}">
                                        <img class="default-img" src="{{asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}">
                                        <img class="hover-img" src="{{asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a href="{{route('product-detail', ['slug'=>$product->slug])}}" class="action-btn small hover-up" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0" wire:click.prevent="wishlist('{{$product->id}}','{{$product->name}}', {{$product->price}})">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0" wire:click.prevent="compare('{{$product->id}}','{{$product->name}}', '{{$product->price}}', {{$product->stock}})">
                                        <i class="fa fa-random"></i>
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        @if ($product->featured == 1)
                                            Featured
                                        @else
                                            Hot
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{route('product-detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>&#2547; {{$product->price}} </span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </div>
                        
                        <!--End product-cart-wrap-2-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if($sale)
    <section class="deals section-padding">
        <div class="container">
            <div class="row">

                @if($products->count() > 0 && $sale->status == '1' && $sale->end >= Carbon\Carbon::now())
                @foreach($sproducts as $product)
                <div class="col-lg-6 deal-co">
                    <div class="deal wow fadeIn animated mb-md-4 mb-sm-4 mb-lg-0" style="background-image: url('assets/images/product/{{$product->front_image}}');">
                        <div class="deal-top">
                            <h2 class="text-brand">Deal of the Day.</h2>
                            <h5>Limited quantities.</h5>
                        </div>
                        <div class="deal-content">
                            <h6 class="product-title"><a href="{{route('product-detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h6>
                            <div class="product-price"><span class="new-price">&#2547; {{$product->sale_price}}</span>
                                <span class="old-price">&#2547; {{$product->price}}</span>
                            </div>
                        </div>
                        <div class="deal-bottom">
                            <p>Hurry Up! Offer End In:</p>
                            <div class="deals-countdown" data-countdown="{{ Carbon\Carbon::parse($sale->end)->format('Y/m/d h:m:s') }}">
                                
                            </div>
                            <a href="/shop" class="btn hover-up">Shop Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @endif
    <section class="section-padding">
        <div class="container pb-20">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @forelse ( $brands as $brand )
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand')}}/{{$brand->logo}}" alt="brand_logo{{$brand->id}}">
                        </div>
                    @empty
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-1.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-2.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-3.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-4.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-5.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-6.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('assets/images/brand/brand-3.png') }}" alt="">
                        </div> 
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="bg-grey-9 section-padding" wire:ignore>
        <div class="container pt-15 pb-25">
            <div class="heading-tab d-flex">
                <div class="heading-tab-left wow fadeIn animated">
                    <h3 class="section-title mb-20"><span>Monthly</span> Best Sell</h3>
                </div>
                <div class="heading-tab-right wow fadeIn animated">
                    <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                @forelse($slids as $slider)
                <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2 wow fadeIn animated">
                        <img src="{{ asset('assets/images') }}/{{$slider->image}}" alt="{{$slider->title}}">
                        <div class="banner-text">
                            <span>{{$slider->title}}</span>
                            <h4 class="mt-5">{{nl2br($slider->subtitle) }}</h4>
                            <a href="{{$slider->link}}" class="text-gray btn btn-success">Shop Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-lg-3 d-none d-lg-flex">
                        <div class="banner-img style-2 wow fadeIn animated">
                            <img src="assets/images/banner-9.jpg" alt="">
                            <div class="banner-text">
                                <span>Women</span>
                                <h4 class="mt-5">Save 17% <br>Clothing</h4>
                                <a href="/shop" class="text-gray btn btn-danger">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="col-lg-9 col-md-12">
                    <div class="tab-content wow fadeIn animated" id="myTabContent-1" wire:ignore>
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1" >
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach ($popularProducts as $p_product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product-detail',['slug'=>$p_product->slug])}}">
                                                        <img class="default-img" src="{{ asset('assets/images/product') }}/{{$p_product->front_image}}" alt="{{$p_product->slug}}">
                                                        <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$p_product->back_image}}" alt="{{$p_product->slug}}">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a href="{{route('product-detail', ['slug'=>$p_product->slug])}}" class="action-btn small hover-up">
                                                    <i class="fa fa-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" wire:click.prevent="wishlist('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})"><i class="fa fa-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" wire:click.prevent="compare('{{$p_product->id}}','{{$p_product->name}}', '{{$p_product->price}}', {{$p_product->stock}})"><i class="fa fa-random"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Popular</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{$p_product->category->name}}</a>
                                                </div>
                                                <h2><a href="{{route('product-detail',['slug'=>$p_product->slug])}}">{{$p_product->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; {{$p_product->price}} </span>
                                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$p_product->id}}','{{$p_product->name}}', {{$p_product->price}})"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1" wire:ignore>
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    @foreach ($popularProducts as $f_product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product-detail',['slug'=>$f_product->slug])}}">
                                                        <img class="default-img" src="{{ asset('assets/images/product') }}/{{$f_product->front_image}}" alt="{{$f_product->slug}}">
                                                        <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$f_product->back_image}}" alt="{{$f_product->slug}}">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a href="{{route('product-detail', ['slug'=>$f_product->slug])}}" class="action-btn small hover-up" >
                                                    <i class="fa fa-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" wire:click.prevent="wishlist('{{$f_product->id}}','{{$f_product->name}}', {{$f_product->price}})"><i class="fa fa-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" wire:click.prevent="compare('{{$f_product->id}}','{{$f_product->name}}', {{$f_product->price}})"><i class="fa fa-random"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Featured</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{$f_product->category->name}}</a>
                                                </div>
                                                <h2><a href="{{route('product-detail',['slug'=>$f_product->slug])}}">{{$f_product->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; {{$f_product->price}} </span>
                                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$f_product->id}}','{{$f_product->name}}', {{$f_product->price}})"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1" wire:ignore>
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    @foreach ($popularProducts as $n_product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product-detail',['slug'=>$n_product->slug])}}">
                                                        <img class="default-img" src="{{ asset('assets/images/product') }}/{{$n_product->front_image}}" alt="{{$n_product->slug}}">
                                                        <img class="hover-img" src="{{ asset('assets/images/product') }}/{{$n_product->back_image}}" alt="{{$n_product->slug}}">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a href="{{route('product-detail', ['slug'=>$n_product->slug])}}" class="action-btn small hover-up" >
                                                    <i class="fa fa-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" wire:click.prevent="wishlist('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})"><i class="fa fa-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" wire:click.prevent="compare('{{$n_product->id}}','{{$n_product->name}}', '{{$n_product->price}}', {{$n_product->stock}})"><i class="fa fa-random"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{$n_product->category->name}}</a>
                                                </div>
                                                <h2><a href="{{route('product-detail',['slug'=>$n_product->slug])}}">{{$n_product->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; {{$n_product->price}} </span>
                                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$n_product->id}}','{{$n_product->name}}', {{$n_product->price}})"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container pt-25 pb-20">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="section-title mb-20"><span>From</span> blog</h3>
                    <div class="post-list mb-4 mb-lg-0">
                        @forelse ($blogs as $blog)
                        <article class="wow fadeIn animated">
                            <div class="d-md-flex d-block">
                                <div class="post-thumb d-flex mr-15">
                                    <a class="color-white" href="blog-post-fullwidth.html">
                                        <img src="{{ asset('assets/images')}}/{{$blog->image}}" alt="{{$blog->slug}}">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta mb-10 mt-10">
                                        <a class="entry-meta meta-2" href="blog-category-fullwidth.html"><span class="post-in font-x-small">{{$blog->category->name}}</span></a>
                                    </div>
                                    <h4 class="post-title mb-25 text-limit-2-row">
                                        <a href="blog-post-fullwidth.html">{{$blog->title}}</a>
                                    </h4>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">{{\Carbon\Carbon::parse($blog->updated_at)->isoFormat("MMM DD YYYY")}}</span>
                                            <span class="hit-count has-dot">12M Views</span>
                                        </div>
                                        <a href="blog-post-right.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                            <article class="wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb d-flex mr-15">
                                        <a class="color-white" href="blog-post-fullwidth.html">
                                            <img src="{{asset('assets/images/blog-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta mb-10 mt-10">
                                            <a class="entry-meta meta-2" href="blog-category-fullwidth.html"><span class="post-in font-x-small">Fashion</span></a>
                                        </div>
                                        <h4 class="post-title mb-25 text-limit-2-row">
                                            <a href="blog-post-fullwidth.html">Qualcomm is developing a Nintendo Switch-like console, report says</a>
                                        </h4>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on">14 April 2022</span>
                                                <span class="hit-count has-dot">12M Views</span>
                                            </div>
                                            <a href="blog-post-right.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb d-flex mr-15">
                                        <a class="color-white" href="blog-post-fullwidth.html">
                                            <img src="{{asset('assets/images/blog-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta mb-10 mt-10">
                                            <a class="entry-meta meta-2" href="blog-category-fullwidth.html"><span class="post-in font-x-small">Healthy</span></a>
                                        </div>
                                        <h4 class="post-title mb-25 text-limit-2-row">
                                            <a href="blog-post-fullwidth.html">Not even the coronavirus can derail 5G's global momentum</a>
                                        </h4>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on">14 April 2022</span>
                                                <span class="hit-count has-dot">12M Views</span>
                                            </div>
                                            <a href="blog-post-right.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($blog_sliders as $blog_slider)
                            <div class="col-md-6">
                                <div class="banner-img banner-1 wow fadeIn animated p-1">
                                    <img src="{{ asset('assets/images')}}/{{$blog_slider->image}}" alt="{{$blog_slider->title}}">
                                    <div class="banner-text" style="top: 50%!important;">
                                        <span>{{$blog_slider->title}}</span>
                                        <h4>{{nl2br($blog_slider->subtitle)}}</h4>
                                        <a href="{{$blog_slider->link}}" class="btn btn-sccess btn-sm">Shop Now <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                      
                        <div class="col-md-6">
                            @forelse ($blog_slids as $sliders)
                                <div class="banner-img mb-15 wow fadeIn animated">
                                    <img src="{{ asset('assets/images') }}/{{$sliders->image}}" alt="{{$sliders->title}}">
                                    <div class="banner-text">
                                        <span>{{$sliders->title}}</span>
                                        <h4>{{nl2br($sliders->subtitle)}}</h4>
                                        <a href="{{$sliders->link}}" class="btn btn-success btn-sm">Shop Now <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            @empty
                                <div class="banner-img mb-15 wow fadeIn animated">
                                    <img src="{{ asset('assets/images/banner-6.jpg') }}" alt="">
                                    <div class="banner-text">
                                        <span>Big Offer</span>
                                        <h4>Save 20% on <br>Women's socks</h4>
                                        <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="banner-img banner-2 wow fadeIn animated mb-0">
                                    <img src="{{ asset('assets/images/banner-7.jpg') }}" alt="">
                                    <div class="banner-text">
                                        <span>Smart Offer</span>
                                        <h4>Save 20% on <br>Eardrop</h4>
                                        <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-50">
        <div class="container">
            <div class="row">
                @forelse($sliderss as $slider)
                    <div class="col-12">
                        <div class="banner-bg wow fadeIn animated" style="background-image: url('assets/images/{{$slider->image}}')">
                            <div class="banner-content">
                                <h5 class="text-grey-4 mb-15">{{ $slider->title }}</h5>
                                <h2 class="fw-600">{{ $slider->subtitle }}</h2>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="banner-bg wow fadeIn animated" style="background-image: url('assets/images/banner-8.jpg')">
                            <div class="banner-content">
                                <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                                <h2 class="fw-600">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</h2>
                            </div>
                        </div>
                    </div>
                @endforelse
                
            </div>
        </div>
    </section>
    <section class="mb-45">
        <div class="container">
            <div class="row">
                @forelse ( $slides as $slider)
                    <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                        <div class="banner-img wow fadeIn animated mb-md-4 mb-lg-0">
                            <img src="{{ asset('assets/images') }}/{{$slider->image}}" alt="{{$slider->title}}">
                            <div class="banner-text">
                                <span>{{$slider->title}}</span>
                                <h4>{{$slider->subtitle}}</h4>
                                <a href="{{$slider->link}}" class="btn btn-success">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                        <div class="banner-img wow fadeIn animated mb-md-4 mb-lg-0">
                            <img src="{{asset('assets/images/banner-10.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Shoes Zone</span>
                                <h4>Save 17% on <br>All Items</h4>
                                <a href="/shop">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforelse
                
                <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Deals & Outlet</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-3.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Fish Print Patched T-shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238 </span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-4.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Vintage Floral Print Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-5.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Multi-color Stripe Circle Print T-Shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Top Selling</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-6.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Geometric Printed Long Sleeve Blosue</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-7.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Print Patchwork Maxi Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-8.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Daisy Floral Print Straps Jumpsuit</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Hot Releases</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-9.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Floral Print Casual Cotton Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-1.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Ruffled Solid Long Sleeve Blouse</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238</span>
                                    {{-- <span class="old-price">&#2547; 245</span> --}}
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="#"><img src="{{asset('assets/images/thumbnail-2.jpg')}}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="#">Multi-color Print V-neck T-Shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>&#2547; 238 </span>
                                    {{-- <span class="old-price">BDT 245</span> --}}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>