<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Add New Product</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link active">New Form</li>
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
                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h5>Add New</h5>
                            <a href="{{ route('admin.products') }}" class="btn btn-success">Avaliable Products</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Product Name <b class="text-danger">*</b></label>
                                        <input type="text" name="name" id="name" class="form-control" wire:model="name" wire:keyup="generateslug" />
                                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-control">Product Slug(Auto Generate)<b class="text-danger">*</b></label>
                                        <input type="text" name="slug" id="slug" class="form-control" wire:model="slug">
                                        @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="price" class="label-control">Price<b class="text-danger">*</b></label>
                                    <input type="text" name="price" id="price" class="form-control" wire:model="price">
                                    @error('price')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="sale_price" class="label-control">Sale Price</label>
                                    <input type="text" name="sale_price" id="sale_price" class="form-control" wire:model="sale_price">
                                    @error('sale_price')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="qty" class="label-control">Quantity<b class="text-danger">*</b></label>
                                    <input type="text" name="qty" id="qty" class="form-control" wire:model="qty">
                                    @error('qty')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="SKU" class="label-control">SKU<b class="text-danger">*</b></label>
                                    <input type="text" name="SKU" id="SKU" placeholder="SKU001..." class="form-control" wire:model="SKU">
                                    @error('SKU')<span class="text-danger">{{$message}}</span>@enderror
                                </div>

                                <div class="col-md-2 mt-4">
                                    <label for="status" class="label-control">Status<b class="text-danger">*</b></label>
                                    <select name="status" id="status" class="form-select" wire:model="status">
                                        <option value="" selected>Choose Status</option>
                                        <option value="in-active">In-Active</option>
                                        <option value="active">Active</option>
                                    </select>
                                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <label for="stock" class="label-control">Stock<b class="text-danger">*</b></label>
                                    <select name="stock" id="stock" class="form-select" wire:model="stock">
                                        <option value="" selected>Choose Stock</option>
                                        <option value="InStock">InStock</option>
                                        <option value="OutOfStock">OutOfStock</option>
                                    </select>
                                    @error('stock')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <label for="featured" class="label-control">Featured<b class="text-danger">*</b></label>
                                    <select name="featured" id="featured" class="form-select" wire:model="featured">
                                        <option value="" selected>Choose a featured</option>
                                        <option value="0">Non-Featured</option>
                                        <option value="1">Featured</option>
                                    </select>
                                    @error('featured')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <label for="product_type" class="label-control">Product Type<b class="text-danger">*</b></label>
                                    <select name="product_type" id="product_type" class="form-select" wire:model="product_type">
                                        <option value="" selected>Choose a Product Type</option>
                                        <option value="New">New</option>
                                        <option value="Used">Used</option>
                                        <option value="Refurnished">Refurnished</option>
                                    </select>
                                    @error('product_type')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <label for="category_id" class="label-control">Category<b class="text-danger">*</b></label>
                                    <select name="category_id" id="category_id" class="form-select" wire:model="category_id">
                                        <option value="" selected>Select a Category Name</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <label for="brand_id" class="label-control">Brand<b class="text-danger">*</b></label>
                                    <select name="brand_id" id="brand_id" class="form-select" wire:model="brand_id">
                                        <option value="" selected>Select a Brand Name</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label for="short_description" class="label-control">Product Shoet Description <b class="text-danger">*</b></label>
                                        <input type="text" name="short_description" id="short_description" class="form-control" wire:model="short_description" />
                                        @error('short_description')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group" wire:ignore>
                                        <label class="label-control">Product Description <b class="text-danger">*</b></label>
                                        <textarea id="description" class="form-control" name="description" wire:model="description"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label class="label-control">Product Front Image <b class="text-danger">*</b></label>
                                        <input type="file" name="front_image" id="front_image" class="form-control" wire:model="front_image" />
                                        @error('front_image')<span class="text-danger">{{$message}}</span>@enderror

                                        <div wire:loading wire:target="front_image" wire:key="front_image"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
            
                                        {{-- ImagePreview --}}
                                        @if($front_image)
                                            <img src="{{$front_image->temporaryUrl()}}" width="120px" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label class="label-control">Product Back Image</label>
                                        <input type="file" name="back_image" id="back_image" class="form-control" wire:model="back_image" />

                                        <div wire:loading wire:target="back_image" wire:key="back_image"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
            
                                        {{-- ImagePreview --}}
                                        @if($back_image)
                                            <img src="{{$back_image->temporaryUrl()}}" width="120px" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label class="label-control">Product Gallery </label>
                                        <input type="file" multiple name="gallery" id="gallery" class="form-control" wire:model="gallery" />
                                        
                                        @if($gallery)
                                        @foreach($gallery as $image)
                                            <div wire:loading wire:target="gallery" wire:key="gallery"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
                
                                            {{-- ImagePreview --}}
                                            @if($image)
                                                <img src="{{$image->temporaryUrl()}}" width="120px" alt="">
                                            @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
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
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.('.ckeditor').ckeditor();
        }); --}}
    {{-- <script>
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor', {
                $.('.ckeditor').ckeditor();
                height:360,
            })
        });
    </script> --}}

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
    <script type="text/javascript">
          $(function() {
	            tinymce.init({
	                selector: '#description',
	                setup: function(editor) {
		                editor.on('Change', function(e) {
			                tinyMCE.triggerSave();
			                var d_data = $('#description').val();
			                @this.set('description',d_data);
			            });
		            }
	            });
            });
    </script>
@endpush