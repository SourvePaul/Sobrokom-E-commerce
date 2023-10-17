<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span>{{$product->category->name}}</span> 
                <span>{{$product->name}}</span> 
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12" wire:ignore.self>
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fa fa-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}">
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="{{asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}"></div>
                                        <div><img src="{{asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}"></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            @if($sale)
                            @if($product->sale_price > 0 && $sale->status == '1' && $sale->end >= Carbon\Carbon::now())
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span style="display:flex;flex-direction:row;"> Brands: <a href="{{route('brand', ['id'=>$product->brand->id])}}" style="text-transform:capitalize;"> {{ $product->brand->name}}</a></span>
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
                                            <ins><span class="text-brand">&#2547; {{$product->sale_price}}</span></ins>
                                            <ins><span class="old-price font-md ml-15">&#2547; {{$product->price}}</span></ins>
                                            <span class="save-price  font-md color3 ml-15">{{number_format(($product->sale_price / $product->price)*100,0,2) }}% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{$product->short_description}}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fa fa-crown mr-5"></i>1 Year Brand Warranty</li>
                                            <li class="mb-10"><i class="fa fa-refresh mr-5"></i>30 Day Return Policy</li>
                                            <li><i class="fa fa-credit-card mr-5"></i>Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <select name="color" id="color" class="form-control" wire:model="color">
                                            <option value="default" selected>Select Color</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->color}}">{{$attribute->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <select name="size" id="size" class="form-control" wire:model="size">
                                            <option value="default" selected>Select Size</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    @if(Session::has('message'))
                                            <div class="alert alert-success text-dark">
                                                {{Session::get('message')}}
                                            </div>
                                    @endif
                                    <div class="detail-extralink">
                                        {{-- <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fa fa-angle-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        {{-- <div class="detail-qty border radius" wire:ignore>
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-down"></i></a>
                                            <input type="number" class="qty-val" min="0" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" style="border: none; padding:0; margin:0;" />
                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart" wire:click.prevent="store('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')" >Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')"><i class="fa fa-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')"><i class="fa fa-random"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#"> {{$product->SKU}} </a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5"> {{ number_format($product->quantity,0) }} Items {{$product->status}} </span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                            @else
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span style="display:flex;flex-direction:row;"> Brands: <a href="{{route('brand', ['id'=>$product->brand->id])}}" style="text-transform:capitalize;"> {{ $product->brand->name}}</a></span>
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
                                            {{-- <ins><span class="old-price font-md ml-15">&#2547; 200</span></ins> --}}
                                            {{-- <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{$product->short_description}}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fa fa-crown mr-5"></i>1 Year Brand Warranty</li>
                                            <li class="mb-10"><i class="fa fa-refresh mr-5"></i>30 Day Return Policy</li>
                                            <li><i class="fa fa-credit-card mr-5"></i>Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <select name="color" id="color" class="form-control" wire:model="color">
                                            <option value="default" selected>Select Color</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->color}}">{{$attribute->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <select name="size" id="size" class="form-control" wire:model="size">
                                            <option value="default" selected>Select Size</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    @if(Session::has('message'))
                                            <div class="alert alert-success text-dark">
                                                {{Session::get('message')}}
                                            </div>
                                    @endif
                                    <div class="detail-extralink">
                                        {{-- <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fa fa-angle-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        {{-- <div class="detail-qty border radius" wire:ignore>
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-down"></i></a>
                                            <input type="number" class="qty-val" min="0" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" style="border: none; padding:0; margin:0;" />
                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart" wire:click.prevent="store('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')" >Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')"><i class="fa fa-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')"><i class="fa fa-random"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#"> {{$product->SKU}} </a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5"> {{ number_format($product->quantity,0) }} Items {{$product->status}} </span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                            @endif
                            @else
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span style="display:flex;flex-direction:row;"> Brands: <a href="{{route('brand', ['id'=>$product->brand->id])}}" style="text-transform:capitalize;"> {{ $product->brand->name}}</a></span>
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
                                            {{-- <ins><span class="old-price font-md ml-15">&#2547; 200</span></ins> --}}
                                            {{-- <span class="save-price  font-md color3 ml-15">25% Off</span> --}}
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{$product->short_description}}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fa fa-crown mr-5"></i>1 Year Brand Warranty</li>
                                            <li class="mb-10"><i class="fa fa-refresh mr-5"></i>30 Day Return Policy</li>
                                            <li><i class="fa fa-credit-card mr-5"></i>Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <select name="color" id="color" class="form-control" wire:model="color">
                                            <option value="default" selected>Select Color</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->color}}">{{$attribute->color}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <select name="size" id="size" class="form-control" wire:model="size">
                                            <option value="default" selected>Select Size</option>
                                            @foreach($product->attributes as $attribute)
                                                <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    @if(Session::has('message'))
                                            <div class="alert alert-success text-dark">
                                                {{Session::get('message')}}
                                            </div>
                                    @endif
                                    <div class="detail-extralink">
                                        {{-- <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fa fa-angle-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        {{-- <div class="detail-qty border radius" wire:ignore>
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-down"></i></a>
                                            <input type="number" class="qty-val" min="0" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" style="border: none; padding:0; margin:0;" />
                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fa fa-angle-up"></i></a>
                                        </div> --}}
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart" wire:click.prevent="store('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')" >Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')"><i class="fa fa-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}', '{{$product->name}}', '{{$product->price}}')"><i class="fa fa-random"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#"> {{$product->SKU}} </a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5"> {{ number_format($product->quantity,0) }} Items {{$product->status}} </span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-10 m-auto entry-main-content">
                                <h2 class="section-title style-1 mb-30">Description</h2>
                                <div class="description mb-50">
                                    <p>{!! $product->description !!}</p>
                                    
                                </div>
                                {{-- <h3 class="section-title style-1 mb-30">Additional info</h3>
                                <table class="font-md mb-30">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook">
                                            <a href="#"><img src="{{asset('assets/images/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                        </li>
                                        <li class="social-twitter">
                                            <a href="#"><img src="{{asset('assets/images/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                        </li>
                                        <li class="social-instagram">
                                            <a href="#"><img src="{{asset('assets/images/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                        </li>
                                        <li class="social-linkedin">
                                            <a href="#"><img src="{{asset('assets/images/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="section-title style-1 mb-30 mt-30">Reviews (3)</h3>
                                <!--Comments-->
                                <div class="comments-area style-2">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{asset('assets/imagesavatar-6.jpg') }}" alt="">
                                                            <h6><a href="#">Jacky Chan</a></h6>
                                                            <p class="font-xxs">Since 2012</p>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width:90%"></div>
                                                            </div>
                                                            <p>Thank you very fast shipping from Poland only 3days.</p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="font-xs mr-30">
                                                                        December 4, 2020 at 3:12 pm
                                                                    </p>
                                                                    <a href="#" class="text-brand btn-reply">
                                                                        Reply 
                                                                        <i class="fa fa-arrow-right"></i> 
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single-comment -->
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{asset('assets/images/avatar-7.jpg') }}" alt="">
                                                            <h6><a href="#">Ana Rosie</a></h6>
                                                            <p class="font-xxs">Since 2008</p>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width:90%"></div>
                                                            </div>
                                                            <p>Great low price and works well.</p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="font-xs mr-30">
                                                                        December 4, 2020 at 3:12 pm
                                                                    </p>
                                                                    <a href="#" class="text-brand btn-reply">
                                                                        Reply 
                                                                        <i class="fa fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single-comment -->
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{asset('assets/images/avatar-8.jpg') }}" alt="">
                                                            <h6><a href="#">Steven Keny</a></h6>
                                                            <p class="font-xxs">Since 2010</p>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width:90%">
                                                                </div>
                                                            </div>
                                                            <p>Authentic and Beautiful, Love these way more than ever
                                                                expected They are Great earphones</p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="font-xs mr-30">
                                                                        December 4, 2020 at 3:12 pm
                                                                    </p>
                                                                    <a href="#" class="text-brand btn-reply">
                                                                        Reply 
                                                                        <i class="fa fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--single-comment -->
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <div class="product-rate d-inline-block mb-30">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">
                                                        Submit Review
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products" wire:ignore>
                                    @forelse($related as $prod)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product-detail', ['slug'=>$prod->slug])}}" tabindex="0">
                                                        <img class="default-img" src="{{asset('assets/images/product')}}/{{$prod->front_image}}" alt="{{$prod->slug}}">
                                                        <img class="hover-img" src="{{asset('assets/images/product')}}/{{$prod->back_image}}" alt="{{$prod->slug}}">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a class="action-btn small hover-up" href="{{route('product-detail', ['slug'=>$prod->slug])}}"><i class="fa fa-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" wire:click="wishlist('{{$prod->id}}', '{{$prod->name}}', '{{$prod->price}}')" tabindex="0">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" wire:click="compare('{{$prod->id}}', '{{$prod->name}}', '{{$prod->price}}')" tabindex="0">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{route('product-detail', ['slug'=>$prod->slug])}}" tabindex="0">{{$prod->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; 238 </span>
                                                    <span class="old-price">&#2547; 245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/shop" tabindex="0">
                                                        <img class="default-img" src="{{asset('assets/images/product-2-1.jpg') }}" alt="">
                                                        <img class="hover-img" src="{{asset('assets/images/product-2-2.jpg') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="/shop" tabindex="0">Ulstra Bass Headphone</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; 238 </span>
                                                    <span class="old-price">&#2547; 245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/shop" tabindex="0">
                                                        <img class="default-img" src="{{asset('assets/images/product-3-1.jpg') }}" alt="">
                                                        <img class="hover-img" src="{{asset('assets/images/product-4-2.jpg') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="/shop" tabindex="0">Smart Bluetooth Speaker</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; 138</span>
                                                    <span class="old-price">&#2547; 145</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/shop" tabindex="0">
                                                        <img class="default-img" src="{{asset('assets/images/product-4-1.jpg') }}" alt="">
                                                        <img class="hover-img" src="{{asset('assets/images/product-4-2.jpg') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="/shop" tabindex="0">HomeSpeak 12UEA Goole</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; 738</span>
                                                    <span class="old-price">&#2547; 1245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up mb-0">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/shop" tabindex="0">
                                                        <img class="default-img" src="{{asset('assets/images/product-5-1.jpg') }}" alt="">
                                                        <img class="hover-img" src="{{asset('assets/images/product-3-2.jpg') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="/shop" tabindex="0">Dadua Camera 4K 2022EF</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span></span>
                                                </div>
                                                <div class="product-price">
                                                    <span>&#2547; 89 </span>
                                                    <span class="old-price">&#2547; 98</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                            <img class="border-radius-10" src="{{asset('assets/images/banner-4.png') }}" alt="">
                            <div class="banner-text">
                                <h4 class="mb-15 mt-40">Repair Services</h4>
                                <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
