<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box d-flex">
                    <h4 class="page-title">All Avaliable Coupons</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{route('admin.add_coupon')}}" ><i class="fa fa-plus mr-2"></i>ADD Coupon</a>
                        </li>
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
                            <h5>All Coupons (<code>{{ $coupons->count() }}</code>)</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-styled mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Coupons Value</th>
                                        <th>Type</th>
                                        <th>Cart Value</th>
                                        <th>Status</th>
                                        <th>Expire Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$coupon->id}}</td>
                                            <td>
                                                {{$coupon->name}}
                                            </td>
                                            <td>
                                                @if($coupon->type === 'fixed')
                                                    {{$coupon->coupon_value}}
                                                @else
                                                    {{$coupon->coupon_value}} %
                                                @endif
                                            </td>
                                            <td>
                                                {{$coupon->type}}
                                            </td>
                                            <td>
                                                {{$coupon->cart_value}}
                                            </td>
                                            <td>
                                                @if($coupon->status === '1')
                                                    <a href="#" wire:click.prevent="changeStatus('{{$coupon->id}}', '0')" >
                                                        <label class="mb-0 badge badge-success toltiped">Active</label>
                                                    </a>
                                                @elseif($coupon->status === '0')
                                                    <a href="#" wire:click.prevent="changeStatus('{{$coupon->id}}', '1')" >
                                                        <label class="mb-0 badge badge-danger toltiped">In-active</label>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{$coupon->end}}</td>
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
                                                            <a href="{{route('admin.edit_coupon',['id'=>$coupon->id])}}"><i class="fa fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="confirm('Are you sure, want to delete this coupon!.') || event.stopImmediatePropagation()" wire:click.prevent="deletecoupon('{{$coupon->id}}')" ><i class="fa fa-trash mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $coupons->links("pagination::bootstrap-4") }}
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