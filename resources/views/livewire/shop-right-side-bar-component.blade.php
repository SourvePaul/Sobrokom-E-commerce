<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span>Shop</span> 
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <x-list />
                            <x-grid />
                            <x-right_grid />
                            <x-perPage />
                            <x-sort />
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @forelse ($products as $product)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product-detail',['slug'=>$product->slug])}}">
                                                <img class="default-img"
                                                    src="{{ asset('assets/images/product')}}/{{$product->front_image}}"
                                                    alt="{{$product->slug}}">
                                                <img class="hover-img"
                                                    src="{{ asset('assets/images/product')}}/{{$product->back_image}}"
                                                    alt="{{$product->slug}}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal-{{$product->id}}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}', '{{$product->name}}', {{$product->price}})">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}', '{{$product->name}}', '{{$product->price}}', {{$product->stock}})">
                                                <i class="fa fa-random"></i>
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product-detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>&#2547;{{$product->price}} </span>
                                            <span class="old-price">&#2547; 245</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store('{{$product->id}}', '{{$product->name}}', {{$product->price}})">
                                                <i class="fa fa-shopping-bag"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" id="quickViewModal-{{$product->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
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
                                                            <div>
                                                                <img src="{{ asset('assets/images/product')}}/{{$product->front_image}}" alt="{{$product->slug}}">
                                                            </div>
                                                            <div>
                                                                <img src="{{ asset('assets/images/product')}}/{{$product->back_image}}" alt="{{$product->slug}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Gallery -->
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li><strong class="mr-10">Share this:</strong></li>
                                                            <li class="social-facebook">
                                                                <a href="#">
                                                                    <img src="{{ asset('assets/images/icon-facebook.svg') }}" alt="">
                                                                </a>
                                                            </li>
                                                            <li class="social-twitter">
                                                                <a href="#">
                                                                    <img src="{{ asset('assets/images/icon-twitter.svg') }}" alt="">
                                                                </a>
                                                            </li>
                                                            <li class="social-instagram">
                                                                <a href="#">
                                                                    <img src="{{ asset('assets/images/icon-instagram.svg') }}" alt="">
                                                                </a>
                                                            </li>
                                                            <li class="social-linkedin">
                                                                <a href="#">
                                                                    <img src="{{ asset('assets/images/icon-pinterest.svg') }}" alt="">
                                                                </a>
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
                                                                <ins><span
                                                                        class="old-price font-md ml-15">&#2547; 200</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                                                            </div>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                        <div class="short-desc mb-30">
                                                            <p class="font-sm">{{$product->short_description}}</p>
                                                        </div>

                                                        <div class="attr-detail attr-color mb-15">
                                                            <strong class="mr-10">Color</strong>
                                                            <ul class="list-filter color-filter">
                                                                <li><a href="#" data-color="Red"><span class="product-color-red"></span></a>
                                                                </li>
                                                                <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                                                <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                                                <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                                                <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a>
                                                                </li>
                                                                <li><a href="#" data-color="Green"><span class="product-color-green"></span></a>
                                                                </li>
                                                                <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="attr-detail attr-size">
                                                            <strong class="mr-10">Size</strong>
                                                            <ul class="list-filter size-filter font-small">
                                                                <li><a href="#">S</a></li>
                                                                <li class="active"><a href="#">M</a></li>
                                                                <li><a href="#">L</a></li>
                                                                <li><a href="#">XL</a></li>
                                                                <li><a href="#">XXL</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                        <div class="detail-extralink">
                                                            <div class="product-extra-link2">
                                                                <button type="button" class="button button-add-to-cart" wire:click.prevent="store('{{$product->id}}', '{{$product->name}}', {{$product->price}})">Add to cart</button>
                                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist('{{$product->id}}', '{{$product->name}}', {{$product->price}})"><i class="fa fa-heart"></i></a>
                                                                <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="compare('{{$product->id}}', '{{$product->name}}', '{{$product->price}}', {{$product->stock}})"><i class="fa fa-random"></i></a>
                                                            </div>
                                                        </div>
                                                        <ul class="product-meta font-xs color-grey mt-50">
                                                            <li class="mb-5">SKU: <a href="#">{{$product->SKU}}</a></li>
                                                            <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                                            <li>Availability:<span class="in-stock text-success ml-5">{{$product->quantity}} Items {{$product->stockstatus}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Detail Info -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                                <img src="{{asset('assets/images/no_record.png')}}" alt="" />
                            </div>
                        @endforelse
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            {{$products->links("pagination::bootstrap-4")}}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar" wire:ignore>
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <x-categories />
                    <!-- Fillter By Price -->
                    <x-priceslider />
                    <!-- Product sidebar Widget -->
                    <x-product_sidebar />
                    <x-banner_sidebar />
                </div>
            </div>
        </div>
    </section>
</main>
@push('scripts')
<script>
    var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
	        start: [0, 10000],
	        connect: true,
	        range: {
		        'min':10,
		        'max':10000,
	        },
	        pips: {
		        mode: 'steps',
		        stepped: true,
		        density: 1,
	        },
        });
        slider.noUiSlider.on('update', function(value) {
	        @this.set('min_price', value[0]);
	        @this.set('max_price', value[1]);
        });
</script>
@endpush
