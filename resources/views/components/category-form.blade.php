<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <h4>Admin</h4>
            <p class="card-desc"> Add New Category </p>
        </div>
        <div class="card-body">
            <form class="separate-form" enctype="multipart/form-data" wire:submit.prevent="addCategory">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h5 class="from-title mb-1">Category Info</h5>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="member-name" class="col-form-label">Category Name</label>
                                <input class="form-control" type="text" placeholder="Enter Category Name" id="member-name" name="name" wire:model="name" wire:keyup="generateslug">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="member-slug" class="col-form-label">Category Slug(auto Generate)</label>
                                <input class="form-control" type="text" placeholder="Enter Your Email" id="member-slug" name="slug" wire:model="slug">
                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="logo" class="col-form-label">Category Logo</label>
                                <input class="form-control" type="file" id="logo" name="logo" wire:model="logo">
                                @error('logo')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div wire:loading wire:target="logo" wire:key="logo"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i>Uploading</div>

                            {{-- ImagePreview --}}
                            @if($logo)
                                <img src="{{$logo->temparoryUrl()}}" width="120px" alt="">
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
