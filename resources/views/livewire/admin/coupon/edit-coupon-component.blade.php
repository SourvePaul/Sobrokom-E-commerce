<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Coupon </h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.coupons') }}" style="color: red;"><i class="fa fa-arrow-left"></i> Back</a>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-desc"> Edit Coupon </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form"  wire:submit.prevent="updateCoupon">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Coupon Info</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-name" class="col-form-label">Coupon Name</label>
                                            <input class="form-control" type="text" id="member-name" name="name" wire:model="name" >
                                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-value" class="col-form-label">Coupon Value</label>
                                            <input class="form-control" type="number" id="member-value" name="coupon_value" wire:model="coupon_value" >
                                            @error('coupon_value')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-cart_value" class="col-form-label">Cart Value</label>
                                            <input class="form-control" type="number" id="member-cart_value" name="cart_value" wire:model="cart_value" >
                                            @error('cart_value')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="end" class="col-form-label">Coupon Expire Date</label>
                                            <input type="text" class="form-control" name="end" id="end" wire:model="end">
                                            @error('end')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-type" class="col-form-label">Coupon Type</label>
                                            <select name="type" id="member-type" class="form-control" wire:model="type">
                                                <option value="" selected>Choose a coupon type</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="percentage">Percentage</option>
                                            </select>
                                            @error('type')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-status" class="col-form-label">Status</label>
                                            <select name="status" id="member-status" class="form-control" wire:model="status">
                                                <option value="" selected>Choose a coupon status</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-active</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                               
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-footer-btm">
        <p>Copyright 2023 © EIL All Rights Reserved.</p>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#end').datetimepicker({
                format: 'Y-MM-DD h:m:s',
            })
            .on('dp.change', function(ev) {
                var date = $('#end').val();
                @this.set('end', data);
            });
        });
    </script>
@endpush