<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">SaleOn Timer Configure</h4>
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
                        <p class="card-desc">Sale-On Timer </p>
                    </div>
                    <div class="card-body">
                        <form class="separate-form" wire:submit.prevent="updateSale">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Sale Info</h5>
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" wire:ignore>
                                        <div class="form-group">
                                            <label for="member-status" class="col-form-label">Status</label>
                                            <select name="status" id="member-status" class="form-control" wire:model="status">
                                                <option value="" selected>Choose a status</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="start" class="col-form-label">Sale Start Date</label>
                                            <input type="text" class="form-control" name="start" id="start" wire:model="start">
                                            @error('start')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="end" class="col-form-label">Sale End Date</label>
                                            <input type="text" class="form-control" name="end" id="end" wire:model="end">
                                            @error('end')<span class="text-danger">{{$message}}</span>@enderror
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
            $('#start').datetimepicker({
                format: 'Y-MM-DD h:m:s',
            })
            .on('dp.change', function(ev) {
                var date = $('#start').val();
                @this.set('start', data);
            });
        });
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
