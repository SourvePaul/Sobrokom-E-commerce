<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Website and Mobile View Setting</h4>
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
    <div class="from-wrapper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-desc"> General Setting </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" wire:submit.prevent="updateSetting">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Home Page Setting Info</h5>
                                <div class="row">

                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-name" class="col-form-label">Website and Application Name</label>
                                            <input type="text" class="form-control" name="name" id="member-name" wire:model="name">
                                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-hotline" class="col-form-label"> Hotline Contact </label>
                                            <input type="text" class="form-control" name="hotline" id="member-hotline" wire:model="hotline">
                                            @error('hotline')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-email" class="col-form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="member-email" wire:model="email">
                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-mobile" class="col-form-label">Mobile Contact</label>
                                            <input type="text" class="form-control" name="mobile" id="member-mobile" wire:model="mobile">
                                            @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-address" class="col-form-label">Office / Shop Address</label>
                                            <input type="text" class="form-control" name="address" id="member-address" wire:model="address">
                                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-map" class="col-form-label">Map</label>
                                            <input type="text" class="form-control" name="map" id="member-map" wire:model="map">
                                            @error('map')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-facebook" class="col-form-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" id="member-facebook" wire:model="facebook">
                                            @error('facebook')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-youtube" class="col-form-label">Youtube</label>
                                            <input type="text" class="form-control" name="youtube" id="member-youtube" wire:model="youtube">
                                            @error('youtube')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-instagram" class="col-form-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" id="member-instagram" wire:model="instagram">
                                            @error('instagram')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-pinterest" class="col-form-label">Pinterest</label>
                                            <input type="text" class="form-control" name="pinterest" id="member-pinterest" wire:model="pinterest">
                                            @error('pinterest')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="member-twitter" class="col-form-label">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" id="member-twitter" wire:model="twitter">
                                            @error('twitter')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="label-control">Web Logo</label>
                                            <input type="file" name="n_web_logo" id="n_web_logo" class="form-control" wire:model="n_web_logo" />
    
                                            <div wire:loading wire:target="n_web_logo" wire:key="n_web_logo"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
                
                                            {{-- ImagePreview --}}
                                            @if($n_web_logo)
                                                <img src="{{$n_web_logo->temporaryUrl()}}" width="120px" alt="">
                                            @else
                                                <img src="{{asset('assets/images')}}/{{$web_logo}}" width="120px" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="label-control">Mobile Logo</label>
                                            <input type="file" name="n_mobile_logo" id="n_mobile_logo" class="form-control" wire:model="n_mobile_logo" />
    
                                            <div wire:loading wire:target="n_mobile_logo" wire:key="n_mobile_logo"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
                
                                            {{-- ImagePreview --}}
                                            @if($n_mobile_logo)
                                                <img src="{{$n_mobile_logo->temporaryUrl()}}" width="120px" alt="">
                                            @else
                                                <img src="{{asset('assets/images')}}/{{$mobile_logo}}" width="120px" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="label-control">Web Footer Logo</label>
                                            <input type="file" name="n_footer_logo" id="n_footer_logo" class="form-control" wire:model="n_footer_logo" />
    
                                            <div wire:loading wire:target="n_footer_logo" wire:key="n_footer_logo"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
                
                                            {{-- ImagePreview --}}
                                            @if($n_footer_logo)
                                                <img src="{{$n_footer_logo->temporaryUrl()}}" width="120px" alt="">
                                            @else
                                                <img src="{{asset('assets/images')}}/{{$footer_logo}}" width="120px" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="label-control">Mobile Footer Logo</label>
                                            <input type="file" name="n_m_footer_logo" id="n_m_footer_logo" class="form-control" wire:model="n_m_footer_logo" />
    
                                            <div wire:loading wire:target="n_m_footer_logo" wire:key="n_m_footer_logo"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>
                
                                            {{-- ImagePreview --}}
                                            @if($n_m_footer_logo)
                                                <img src="{{$n_m_footer_logo->temporaryUrl()}}" width="120px" alt="">
                                            @else
                                                <img src="{{asset('assets/images')}}/{{$m_footer_logo}}" width="120px" alt="">
                                            @endif
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
