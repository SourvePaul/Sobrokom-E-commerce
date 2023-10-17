<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home </a>
                <i class="fa fa-arrow-right"></i> Edit 
                <i class="fa fa-arrow-right"></i> Password
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        @if(Session::has('success'))
            <div class="alert alert-success text-dark">{{Session::get('success')}}</div>
        @elseif (Session::has('fail'))
            <div class="alert alert-danger text-dark">{{Session::get('fail')}}</div>
        @endif
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 style="text-align: center; font-weight:bold; color:#c60038; font-size: 25px;">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="changePassword">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="current_password" class="label-control">Old Password</label>
                                        <input type="password" name="current_password" id="current_password" placeholder="Customer Old Password.." class="form-control" wire:model="current_password">
                                        @error('current_password')<span class="error text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="label-control">New Password</label>
                                        <input type="password" name="password" id="password" placeholder="New Password here.." class="form-control" wire:model="password">
                                        @error('password')<span class="error text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="label-control">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password here.." class="form-control" wire:model="password_confirmation">
                                        @error('password_confirmation')<span class="error text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger pull-right">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>