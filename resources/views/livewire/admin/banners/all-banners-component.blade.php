<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box d-flex">
                    <h4 class="page-title">All Avaliable Banners&nbsp; ({{$banners->count()}})</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{route('admin.add_banner')}}" ><i class="fa fa-plus mr-2"></i>ADD Banner</a>
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
                                    <option value="" selected disabled>Choose Sorting Type</option>
                                    <option value="asc">New to Old Products</option>
                                    <option value="desc">Old to New Products</option>
                                </select>
                            </div>

                            <div class="pull-right p-1" style="float: right">
                                <input type="text" class="form-control" name="search" id="search" placeholder="search here by the Banner position.." wire:model="search"/>
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
                                                            <a href="{{route('admin.edit_banner',['id'=>$banner->id])}}"><i class="fa fa-edit mr-2 "></i>Edit</a>
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
                            {{ $banners->links("pagination::bootstrap-4") }}
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