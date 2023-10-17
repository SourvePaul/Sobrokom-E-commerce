<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home </a>
                <i class="fa fa-arrow-right"></i> Order
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">

        <div class="container">
            @if($orders->isEmpty())
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">No Order Found</h5>
                                    <p class="card-text">There are currently no orders to display.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#SR</th>
                                <th>Order</th>
                                <th>Order Total</th>
                                <th>Customer</th>
                                <th>Order Status</th>
                                <th>Delivery Date</th>
                                <th>Order Date</th>
                                <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            @php
                            $i=1;
                            @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->total}}</td>
                                <td>
                                    <div>
                                        <p>{{$order->firstname}} {{$order->lastname}}</p>
                                        <p>Email: <span>{{$order->email}}</span></p>
                                        <p>Mobile: <span>{{$order->mobile}}</span></p>
                                    </div>
                                </td>
                                <td>{{$order->status}}</td>
                                <td>&nbsp; </td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('user_order.detail', ['id'=>$order->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a>
                                </td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            @endif
        </div>
    </section>
</main>