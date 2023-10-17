<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Banner {{$title}}</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link active">
                            <a href="{{route('admin.banners')}}" >All Banners</a>
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
                        <p class="card-desc">Edit Banner </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" enctype="multipart/form-data" wire:submit.prevent="updateBanner">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Banner Info</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-title" class="col-form-label">Banner Title</label>
                                            <input class="form-control" type="text" id="member-title" name="title" wire:model="title">
                                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-subtitle" class="col-form-label">Banner Sub-Title</label>
                                            <input class="form-control" type="text" id="member-subtitle" name="subtitle" wire:model="subtitle">
                                            @error('subtitle')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-link" class="col-form-label">Banner Link</label>
                                            <input class="form-control" type="text" id="member-link" name="link" wire:model="link">
                                            @error('link')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-position" class="col-form-label">Banner Position</label>
                                            <select name="position" id="member-position" class="form-control" wire:model="position">
                                                <option value="0">Main Home Slider</option>
                                                <option value="1">Slider Right Banner</option>
                                                <option value="2">Before Popular Category Banner</option>
                                                <option value="3">After popular Category Banner</option>
                                                <option value="4">Montly Best Sale Banner</option>
                                                <option value="5">Blog Right First Banner</option>
                                                <option value="6">Blog Right Second Banner</option>
                                                <option value="7">After Blog Banner</option>
                                                <option value="8">Home Page Last Banner</option>
                                                <option value="9">Shop Side-Bar Banner</option>
                                                <option value="10">Other Pages Footer Banner</option>
                                            </select>
                                            @error('position')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-status" class="col-form-label">Banner Status</label>
                                            <select name="status" id="member-status" class="form-control" wire:model="status">
                                                <option value="active">Active</option>
                                                <option value="de-active">De-Active</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="new_image" class="col-form-label">Banner Image</label>
                                            <input class="form-control" type="file" id="new_image" name="new_image" wire:model="new_image">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div wire:loading wire:target="new_image" wire:key="new_image"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
            
                                        {{-- ImagePreview --}}
                                        @if($new_image)
                                            <img src="{{$new_image->temporaryUrl()}}" width="120px" alt="">
                                        @elseif ($image)
                                            <img src="{{asset('assets/images')}}/{{$image}}" width="120px" alt="">
                                        @endif
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