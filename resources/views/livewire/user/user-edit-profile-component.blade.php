<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home </a>
                <i class="fa fa-arrow-right"></i> Edit 
                <i class="fa fa-arrow-right"></i> Profile
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        @if(Session::has('message'))
            <div class="alert alert-success text-dark">{{Session::get('message')}}</div>
        @endif
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 style="text-align: center; font-weight:bold; color:#c60038; font-size: 25px;">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit="editUser">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Customer Name</label>
                                        <input type="text" name="name" id="name" placeholder="Customer Name.." class="form-control" wire:model="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="label-control">Customer Email</label>
                                        <input type="email" name="email" id="email" placeholder="Customer Email here.." class="form-control" wire:model="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile" class="label-control">Mobile Number</label>
                                        <input type="number" name="mobile" id="mobile" placeholder="Customer Number here.." class="form-control" wire:model="mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="billing_address" class="label-control">Billing Address</label>
                                        <input type="text" name="billing_address" id="billing_address" placeholder="Billing address here.." class="form-control" wire:model="billing_address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shipping_address" class="label-control">Shipping Address</label>
                                        <input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping address here.." class="form-control" wire:model="shipping_address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger pull-right">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>