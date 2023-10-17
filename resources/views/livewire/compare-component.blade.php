<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span>Shop</span> 
                <span>Compare</span> 
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table text-center">
                            @if(Cart::instance('compare')->count() > 0)
                            <tbody>
                                <tr class="pr_image">
                                    <td class="text-muted font-md fw-600">Preview</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="row_img"><img src="{{ asset('assets/images/product')}}/{{$item->model->front_image}}" width="150" alt="compare-img"></td>
                                    @endforeach
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-md fw-600">Name</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="product_name">
                                            <h5><a href="{{ route('product-detail', ['slug'=>$item->model->slug])}}">{{$item->name}}</a></h5>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-md fw-600">Price</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="product_price"><span class="price">&#2547; {{$item->price}}</span></td>
                                    @endforeach
                                </tr>
                                <tr class="pr_rating">
                                    <td class="text-muted font-md fw-600">Rating</td>
                                    <td>
                                        <div class="rating_wrap">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="rating_num">(121)</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="description">
                                    <td class="text-muted font-md fw-600">Description</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="row_text font-xs">
                                            <p>{!! $item->description !!}</p>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="pr_color">
                                    <td class="text-muted font-md fw-600">Color</td>
                                    <td class="row_color">
                                        <ul class="list-filter color-filter">
                                            <li><a href="#" data-color="Orange">
                                                <span class="product-color-orange"></span>
                                            </a></li>
                                            <li><a href="#" data-color="Cyan">
                                                <span class="product-color-cyan"></span>
                                            </a></li>
                                            <li><a href="#" data-color="Green">
                                                <span class="product-color-green"></span>
                                            </a></li>
                                            <li><a href="#" data-color="Purple">
                                                <span class="product-color-purple"></span>
                                            </a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="pr_size">
                                    <td class="text-muted font-md fw-600">Sizes Available</td>
                                    <td class="row_size">
                                        <ul class="list-filter size-filter mt-15 font-small">
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-md fw-600">Stock status</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="row_stock"><span>{{$item->stock}}</span></td>
                                    @endforeach
                                </tr>
                                <tr class="pr_weight">
                                    <td class="text-muted font-md fw-600">Weight</td>
                                    <td class="row_weight">320 gram</td>
                                </tr>
                                <tr class="pr_dimensions">
                                    <td class="text-muted font-md fw-600">Dimensions</td>
                                    <td class="row_dimensions">N/A</td>
                                </tr>
                                <tr class="pr_add_to_cart">
                                    <td class="text-muted font-md fw-600">Buy now</td>
                                    @foreach(Cart::instance('compare')->content() as $item)
                                        <td class="row_btn"><button class="btn  btn-sm" wire:click.prevent="store('$item->id', '$item->name', '$item->price', '$item->stock',)"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button></td>
                                    @endforeach
                                </tr>
                                <tr class="pr_remove text-muted">
                                    <td class="text-muted font-md fw-600"></td>
                                    <td class="row_remove">
                                        <a href="#"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                                <tbody>
                                    <div>
                                        <img src="{{asset('assets/images/no_record.png')}}" alt="" />
                                    </div>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
