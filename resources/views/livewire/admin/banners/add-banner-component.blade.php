<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Add New Banner</h4>
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
                        <p class="card-desc">New Banner </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" enctype="multipart/form-data" wire:submit.prevent="addBanner">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Banner Info</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-title" class="col-form-label">Banner Title</label>
                                            <input class="form-control" type="text" placeholder="Enter title name" id="member-title" name="title" wire:model="title">
                                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-subtitle" class="col-form-label">Banner Sub-Title</label>
                                            <input class="form-control" type="text" placeholder="Enter sub-title " id="member-subtitle" name="subtitle" wire:model="subtitle">
                                            @error('subtitle')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-link" class="col-form-label">Banner Link</label>
                                            <input class="form-control" type="text" placeholder="Enter banner link.. " id="member-link" name="link" wire:model="link">
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
                                            <label for="image" class="col-form-label">Banner Image</label>
                                            <input class="form-control" type="file" id="image" name="image" wire:model="image">
                                            @error('image')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div wire:loading wire:target="image" wire:key="image"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
            
                                        {{-- ImagePreview --}}
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120px" alt="">
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
            {{-- <x-category-form /> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Recent Added Banners</h5>
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
                                    <th>Banner</th>
                                    <th>Link</th>
                                    <th>Position</th>
                                    <th>Sub-Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$banner->id}}</td>
                                        <td>
                                            <span class="img-thumb">
                                                <a href="{{asset('assets/images')}}/{{$banner->image}}">
                                                    <img src="{{ asset('assets/images') }}/{{ $banner->image }}" alt="banner_image" style="height: 50px!important; width: 120px!important; border-radius:0px!important;" >
                                                </a>
                                                <p class="text-red">Title:&nbsp; <span>{{$banner->title}}</span></p>
                                            </span>
                                        </td>
                                        <td>{{ $banner->link }}</td>
                                        <td>{{ $banner->position }}</td>
                                        <td>{{ $banner->subtitle }}</td>
                                        <td>
                                            @if($banner->status ==='active')
                                                <a href="#" wire:click.prevent="changeStatus('{{$banner->id}}', 'de-active')" >
                                                    <label class="mb-0 badge badge-success toltiped">{{$banner->status}}</label>
                                                </a>
                                            @elseif($banner->status ==='de-active')
                                                <a href="#" wire:click.prevent="changeStatus('{{$banner->id}}', 'active')" >
                                                    <label class="mb-0 badge badge-danger toltiped">{{$banner->status}}</label>
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
                                                        <a href="#"><i class="fa fa-edit mr-2 "></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" onclick="confirm('Are you sure, want to delete this banner!.') || event.stopImmediatePropagation()" wire:click.prevent="deleteBanner('{{$banner->id}}')" ><i class="fa fa-trash mr-2 "></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-footer-btm">
        <p>Copyright 2023 © EIL All Rights Reserved.</p>
    </div>
</div>