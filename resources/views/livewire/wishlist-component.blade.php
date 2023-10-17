<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span>Shop</span> 
                <span>Wishlist</span> 
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                @if(Cart::instance('wishlist')->count() > 0)
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col" colspan="2">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::instance('wishlist')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset('assets/images/product')}}/{{$item->model->front_image}}" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{route('product-detail',['slug'=>$item->model->slug])}}">{{$item->name}}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span>&#2547; {{$item->price}} </span></td>
                                        <td class="text-center" data-title="Stock">
                                            <span class="color3 font-weight-bold">{{$item->model->stock}}</span>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <button class="btn btn-sm"><i class="fa fa-shopping-bag mr-5"></i>Add to cart</button>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="#">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div>
                        <img src="{{asset('assets/images/no_record.png')}}" class="img-fluid" alt="no_record" />
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
