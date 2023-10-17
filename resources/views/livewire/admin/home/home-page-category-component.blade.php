<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Add New Home Page Category</h4>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-desc">Home Page Categories </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" wire:submit.prevent="updateHomeCategory">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Info</h5>
                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" wire:ignore>
                                        <div class="form-group">
                                            <label for="member-categories" class="col-form-label">Selected Categories</label>
                                            <select name="selected_categories[]" multiple="multiple" id="member-categories" class="form-control sel_cat" wire:model="selected_categories">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('selected_categories')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-products" class="col-form-label">Number of Products</label>
                                            <input type="text" class="form-control input-md" name="numberofproducts" id="member-products" wire:model="numberofproducts">
                                            @error('numberofproducts')<span class="text-danger">{{$message}}</span>@enderror
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
        $(document).ready(function(){
            $('.sel_cat').select2();
            $('.sel_cat').on('change', function(e){
                var data = $('.sel_cat').select2("val");
                @this.set('selected_categories', data);
            });
        });
    </script>
@endpush