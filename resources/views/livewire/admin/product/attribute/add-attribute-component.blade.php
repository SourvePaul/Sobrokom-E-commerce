<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title"> Add New Attribute </h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link active">Attribute Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- From Start -->
    <div class="from-wrapper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin</h4>
                        <p class="card-desc"> New Product Attribute </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" wire:submit.prevent="addAttribute">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Attribute Info</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="product_id" class="col-form-label">Product Name</label>
                                            <select name="product_id" id="product_id" class="form-control" wire:model="product_id">
                                                <option value="" selected>Select a Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id}}"> {{$product->name}} </option>
                                                @endforeach
                                            </select>
                                            @error('product_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="size" class="col-form-label">Size or Weight</label>
                                            <select name="size" id="size" class="form-control" wire:model="size">
                                                <option value="" selected>Select a option</option>
                                                <option value="S"> Small </option>
                                                <option value="M"> Medium </option>
                                                <option value="L"> Large </option>
                                                <option value="XS"> Extra Small </option>
                                                <option value="XL"> Extra Large </option>
                                                <option value="XXL"> Extra Ordinary Large </option>
                                                <option value="100g"> 100 Gram </option>
                                                <option value="500g"> 500 Gram </option>
                                                <option value="1kg"> 1KG </option>
                                                <option value="2kg"> 2KG </option>
                                                <option value="5kg"> 5KG </option>
                                                <option value="1"> One Item </option>
                                                <option value="2"> Two Item </option>
                                                <option value="3"> Three Item </option>
                                                <option value="4"> Four Item </option>
                                                <option value="5"> Five Item </option>
                                                <option value="6"> Six Item </option>
                                                <option value="7"> Seven Item </option>
                                                <option value="8"> Eight Item </option>
                                                <option value="9"> Nine Item </option>
                                                <option value="10"> Ten Item </option>
                                                <option value="11"> Eleven Item </option>
                                                <option value="12"> Twelve Item </option>
                                            </select>
                                            @error('size')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="color" class="col-form-label">Color</label>
                                            <input class="form-control" type="text" id="color" name="color" placeholder="black, white, yellow..." wire:model="color">
                                            @error('color')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Save</button>
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