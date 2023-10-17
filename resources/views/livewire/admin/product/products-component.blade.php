<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box d-flex">
                    <h4 class="page-title">All Avaliable Products</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="#" class="p-2"><i class="fas fa-file-excel"></i></a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="#" class="p-2"><i class="fa fa-file-pdf"></i></a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="{{route('admin.add_product')}}"><i class="fa fa-plus mr-1"></i>Add New Product</a>
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
                                    <option value="featured">Featured</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="refurnished">Refurnished</option>
                                </select>
                            </div>

                            <div class="pull-right p-1" style="float: right;">
                                <select name="category" id="category" class="form-control" wire:model="category">
                                    <option value="" selected>Sort By Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pull-right p-1" style="float: right;">
                                <select name="brand" id="brand" class="form-control" wire:model="brand">
                                    <option value="" selected>Sort By Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="pull-right p-1" style="float: right">
                                <input type="text" class="form-control" name="search" id="search" placeholder="search here by the product, category, brand, SKU.." wire:model="search"/>
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
                                        <th>Product</th>
                                        <th>Category & Brand</th>
                                        <th>Featured</th>
                                        <th>SKU</th>
                                        <th>Qty</th>
                                        <th>Sell Qty</th>
                                        <th>Product Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                <span class="img-thumb">
                                                    <img src="{{ asset('assets/images/product') }}/{{$product->front_image}}" alt="{{ $product->name }}">
                                                    <span class="ml-2">{{ $product->name }}</span>
                                                    <p>Slug:&nbsp; <span>{{$product->slug}}</span></p>
                                                    <p>Price:&nbsp; <span>{{$product->price}}</span></p>
                                                    <p>Sell Price:&nbsp; <span>{{$product->sale_price}}</span></p>
                                                    <p>Stock:&nbsp; <span>{{$product->stock}}</span></p>
                                                </span>
                                            </td>
                                            <td>
                                            @if ($product->category && $product->brand)
                                                    <div>
                                                        <p style="color: red;">Category:&nbsp; <span>{{$product->category->name}}</span></p>
                                                        <p style="color: red;">Brand:&nbsp; <span>{{$product->brand->name}}</span></p>
                                                    </div>
                                                @else
                                                    <!-- Handle the case where either category or brand is null -->
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->featured ==='1')
                                                    <a href="#" wire:click.prevent="changeFeatured('{{$product->id}}', '0')">
                                                        <label class="mb-0 badge badge-info toltiped">Featured</label>
                                                    </a>
                                                @else
                                                    <a href="#" wire:click.prevent="changeFeatured('{{$product->id}}', '1')" >
                                                        <label class="mb-0 badge badge-danger toltiped">Non Featured</label>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $product->SKU }}</td>
                                            <th>{{ $product->quantity }}</th>
                                            <td>{{ $product->sale_quantity }}</td>
                                            <td>
                                                @if($product->status ==='active')
                                                    <a href="#" wire:click.prevent="changeStatus('{{$product->id}}', 'in-active')" >
                                                        <label class="mb-0 badge badge-success toltiped">{{$product->status}}</label>
                                                    </a>
                                                @else
                                                    <a href="#" wire:click.prevent="changeStatus('{{$product->id}}', 'active')" >
                                                        <label class="mb-0 badge badge-danger toltiped">{{$product->status}}</label>
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
                                                            <a href="{{route('admin.edit_product',['id'=>$product->id])}}"><i class="fa fa-edit mr-2 "></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="confirm('Are tou sure, want to delete this product!.') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct('{{$product->id}}')"><i class="fa fa-trash-alt mr-2 "></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links("pagination::bootstrap-4") }}
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