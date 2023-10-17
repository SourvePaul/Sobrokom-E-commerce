<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home </a>
                <i class="fa fa-arrow-right"></i> Order Detail
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">

        <div class="container">
            @if(Session::has('msg'))
                <div class="alert alert-warning text-dark">{{Session::get('msg')}}</div>
            @endif
            <div class="d-flex justify-content-between ...">
                <div><a href="/" class="btn btn-danger">Home</a></div>
                <div><a href="{{route('user.dashboard')}}" class="btn btn-danger">Dashboard</a></div>
                <div>
                    @if($order->status ==='delivered')
                        <p>Delivery Date:&nbsp;<span>{{$order->delivery_date}}</span></p>
                    @elseif($order->cancel_date)
                        <p>Cancel Date:&nbsp;<span>{{$order->cancel_date}}</span></p>
                    @else
                        <a href="#" wire:click.prevent="cancelOrder" class="btn btn-warning">Cancel Order</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="container pt-10">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Order</td>
                            <td>
                                <div>
                                    <p>OrderId:&nbsp; <span>{{$order->id}}</span></p>
                                    <p>Order Status:&nbsp; <span>{{$order->status}}</P>
                                    <p>Order Delivery Date:&nbsp; <span>{{$order->delivery_date}}</P>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="pt-3">
                        <h3 class="card-title text-justify" style="color: #c60038;">Order Items Information</h3>
                        <table class="table">
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div>
                                        <p class="pr-5">
                                            <img src="{{asset('assets/images/product')}}/{{$item->front_image}}" style="width:100px;" alt="{{$item->product->name}}">
                                        </p>
                                        <p>Product Name:&nbsp; <span>{{$item->product->name}}</span></p>
                                        <p>Quantity:&nbsp; <span>{{$item->qty}}</span></p>
                                        <p>Price:&nbsp; <span>{{$item->price}}</span></p>
                                        <p>Size:&nbsp; 
                                            <span>
                                                @if($item->size ==='d')
                                                    Available Size
                                                @else
                                                    {{$item->size}}
                                                @endif
                                            </span>
                                        </p>
                                        <p>Color:&nbsp; 
                                            <span>
                                                @if($item->color ==='d')
                                                    Available Color
                                                @else
                                                    {{$item->color}}
                                                @endif
                                            </span>
                                        </p>
                                        @if($order->status ==='delivered' && $item->rstatus =='0')
                                            <p><a href="{{route('user_add.review', ['id'=>$order->id, 'product_id'=>$item->product_id])}}" class="btn btn-success">Add Review</a></p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <table class="table">
                        <tr>
                            <td>Discount</td>
                            <td>{{$order->discount}}l</td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>{{$order->subtotal}}l</td>
                        </tr>
                        <tr>
                            <td>Shipping Charge</td>
                            <td>{{$order->charges}}l</td>
                        </tr>
                        <tr>
                            <td>Shipping Charge</td>
                            <td>{{$order->shipping_charges}}l</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>{{$order->tax}}l</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{$order->total}}l</td>
                        </tr>
                    </table>
                    
                    <div class="pt-5">
                        <h3 class="card-title text-justify" style="color: #c60038;">Billing Information</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                    <th>Postal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->firstname}} {{$order->lastname}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->address1}} {{$order->address2}}</td>
                                    <td>{{$order->city}}</td>
                                    <td>{{$order->province}}</td>
                                    <td>{{$order->country}}</td>
                                    <td>{{$order->zipcode}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if($order->shipping_address)
                    <div class="pt-5">
                        <h3 class="card-title text-justify" style="color: #c60038;">Shipping Information</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                    <th>Postal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->shipping_address->firstname}}&nbsp;{{$order->shipping_address->lastname}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->email}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->address1}}&nbsp;{{$order->shipping_address->address2}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->city}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->province}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->country}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->shipping_address->zipcode}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="pt-5">
                        <h3 class="card-title text-justify" style="color: #c60038;">Transaction Information</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->transcation->id}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->transcation->mode}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->transcation->status}}</td>
                                </tr>
                                <tr>
                                    <td>{{$order->transcation->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>