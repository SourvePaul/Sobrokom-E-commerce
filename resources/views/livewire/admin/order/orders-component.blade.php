<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box d-flex">
                    <h4 class="page-title">All Avaliable Orders&nbsp; ({{$orders->count()}})</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- From Start -->
    @if(Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @elseif(Session::has('err'))
        <div class="alert alert-danger">{{ Session::get('err') }}</div>
    @endif
    <div class="from-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="pull-right p-1" style="float: right;">
                                <select name="perPage" id="perPage" class="form-control" wire:model="perPage">
                                    <option value="default" selected>Sort By Size</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="16">16</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <div class="pull-right p-1" style="float: right;">
                                <select name="sorting" id="sorting" class="form-control" wire:model="sorting">
                                    <option value="" selected>Choose Sorting Type</option>
                                    <option value="desc">New to Old Products</option>
                                    <option value="asc">Old to New Products</option>
                                </select>
                            </div>

                            <div class="pull-right p-1" style="float: right;">
                                <select name="sortBy" id="sortBy" class="form-control" wire:model="sortBy">
                                    <option value="default" selected>Default Sorting </option>
                                    <option value="pending">Pending</option>
                                    <option value="process">Process</option>
                                    <option value="dispatch">Dispatch</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </div>
                            
                            <div class="pull-right p-1" style="float: right">
                                <input type="text" class="form-control" name="search" id="search" placeholder="search here by the city, province, country.." wire:model="search"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-styled mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Country</th>
                                        <th>SubTotal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <span class="img-thumb">
                                                    <img src="{{ asset('assets/images/user.png') }}" alt="{{ $order->user->name }}">
                                                    <span class="ml-2">{{$order->firstname}} &nbsp; {{$order->lastname}}</span>
                                                    <p class="text-red">Contact Email:&nbsp; <span>{{$order->email}}</span></p>
                                                    <p class="text-red">Mobile Number:&nbsp; <span>{{$order->mobile}}</span></p>
                                                </span>
                                            </td>
                                            <td>{{$order->city}}</td>
                                            <td>{{$order->province}}</td>
                                            <td>{{ $order->country }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{$order->total}}</td>
                                            <td>
                                                @if($order->status ==='pending')
                                                    <a href="#" >
                                                        <label class="mb-0 badge badge-info toltiped">{{$order->status}}</label>
                                                    </a>
                                                @elseif($order->status ==='cancel')
                                                    <a href="#" >
                                                        <label class="mb-0 badge badge-danger toltiped">{{$order->status}}</label>
                                                    </a>
                                                @elseif($order->status ==='dispatch')
                                                    <a href="#" >
                                                        <label class="mb-0 badge badge-warning toltiped">{{$order->status}}</label>
                                                    </a>
                                                @elseif($order->status ==='delivered')
                                                    <a href="#" >
                                                        <label class="mb-0 badge badge-success toltiped">{{$order->status}}</label>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="relative ">
                                                <a class="action-btn " href="javascript:void(0); ">
                                                    <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="action-option ">
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('admin.order_detail', ['id'=>$order->id])}}"><i class="fa fa-info-circle mr-2 "></i>Detail Info</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="confirm('Are you sure, want to change status this order!.') || event.stopImmediatePropagation()" wire:click.prevent="changeStatus('{{$order->id}}','dispatch')" ><i class="fa fa-paper-plane mr-2 "></i>Dispatch</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="confirm('Are you sure, want to change status this order!.') || event.stopImmediatePropagation()" wire:click.prevent="changeStatus('{{$order->id}}','delivery')" ><i class="fa fa-shipping-fast mr-2 "></i>Deliverd</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="confirm('Are you sure, want to change status this order!.') || event.stopImmediatePropagation()" wire:click.prevent="changeStatus('{{$order->id}}','cancel')" ><i class="fa fa-window-close mr-2 "></i>Cancel</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-footer-btm">
        <p>Copyright 2023 © EIL All Rights Reserved.</p>
    </div>
</div>