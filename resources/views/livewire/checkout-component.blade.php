<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home')}}" rel="nofollow"> Home </a>
                <a href="{{ route('shop')}}"><i class="fa fa-long-arrow-right"></i> Shop </a>
                <i class="fa fa-long-arrow-right"></i> Checkout
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-6 mb-sm-15">
                    <div class="toggle_info">
                        <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span>
                            <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                Click here to login
                            </a>
                        </span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                below. If you are a new customer, please proceed to the Billing &amp; Shipping section.
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Username Or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="remember" value="">
                                            <label class="form-check-label" for="remember">
                                                <span>Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md" name="login">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span>
                            <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                Click here to enter your code
                            </a>
                        </span>
                    </div>
                    <div class="panel-collapse collapse coupon_form " id="coupon">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                </div>
                                <div class="form-group">
                                    <button class="btn  btn-md" name="login">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <form wire:submit.prevent="placeOrder">
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" required="" name="firstname" placeholder="First name"  wire:model="firstname">
                            @error('firstname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input type="text" required="" name="lastname" placeholder="Last name *" wire:model="lastname">
                            @error('lastname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input required="" type="email" name="email" placeholder="Enter Email address.." wire:model="email">
                            @error('email') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input required="" type="tel" name="mobile" placeholder="Enter mobile number.." wire:model="mobile">
                            @error('mobile') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <div class="custom_select">
                                <select class="form-control" wire:model="country">
                                    <option value="">Choose a country...</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="BD">bangldesh</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                    {{-- @foreach($country as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                    @endforeach --}}
                                </select>
                                @error('country') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address1" required="" placeholder="Address line 1.." wire:model="address1">
                            @error('address1') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="address2" required="" placeholder="Address line 2.." wire:model="address2">
                            @error('address2') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="city" placeholder="City / Town *" wire:model="city">
                            @error('city') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="province" placeholder="State / province *" wire:model="province">
                            @error('province') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *" wire:model="zipcode">
                            @error('zipcode') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input type="checkbox" class="form-check-input" name="checkbox" id="shiptting" value="1"  wire:model="ship_to_different" />
                                    <label for="shiptting" class="form-check-label label_info"><span> Ship to a different address?</span></label>
                                </div>
                            </div>
                        </div>

                        @if($ship_to_different)
                            <div class="ship_detail">
                                <div class="form-group">
                                    <input type="text" required="" name="s_firstname" placeholder="First name *" wire:model="s_firstname" />
                                    @error('s_firstname') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" name="s_lastname" placeholder="Last name *" wire:model="s_lastname" />
                                    @error('s_lastname') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="email" name="s_email" placeholder="Email Address" wire:model="s_email" />
                                    @error('s_email') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="number" name="s_mobile" placeholder="Enter mobile number" wire:model="s_mobile" />
                                    @error('s_mobile') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom_select">
                                        <select class="form-control" wire:model="s_country">
                                            <option value="">Select an option...</option>
                                            <option value="AX">Aland Islands</option>
                                            <option value="AF">bangldesh</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AD">Andorra</option>
                                        </select>
                                        @error('s_country') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="s_address1" required="" placeholder="Address Line 1..." wire:model="s_address1">
                                    @error('s_address1') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="s_address2" required="" placeholder="Address line2.." wire:model="s_address2">
                                    @error('s_address2') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="s_city" placeholder="City / Town *" wire:model="s_city">
                                    @error('s_city') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="s_province" placeholder="State / province *" wire:model="s_province">
                                    @error('s_province') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="s_zipcode" placeholder="Postcode / ZIP *" wire:model="s_zipcode">
                                    @error('s_zipcode') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ asset('assets/images/product')}}/{{$item->model->front_image}}" alt="#"></td>
                                                <td>
                                                    <h5><a href="{{route('product-detail', ['slug'=>$item->model->slug])}}">{{$item->name}}</a></h5>
                                                </td>
                                                <td>&#2547; {{$item->price}} </td>
                                            </tr>
                                        @endforeach

                                        @if(Session::has('checkout'))
                                            <tr>
                                                <th>subtotal</th>
                                                <td class="product-subtotal" colspan="2">&#2547; {{Session::get('checkout')['subtotal']}}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Charges</th>
                                                <td colspan="2"> &#2547; {{(Session::get('checkout')['total']) - (Session::get('checkout')['subtotal'] + Session::get('checkout')['tax'])}} </td>
                                            </tr>                   
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">&#2547; {{Session::get('checkout')['total']}}</span></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    @if($paymentmode == "card")
                                        <div class="warp-address-billing">
                                            @if(Session::has('checkout'))
                                            <div class="text-danger">{{Sesssion::get('message')}}</div>
                                            @endif
                                            <p class="row-in-form">
                                                <label for="card_no">Card Number:</label>
                                                <input type="text" name="card_no" id="card_no" value="" class="form-control" placeholder="card number here.." wire:model="card_no">
                                                @error('card_no')<span class="text-danger">{{$message}}</span>@enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label for="exp_month">Expiry Month:</label>
                                                <input type="text" name="exp_month" id="exp_month" value="" class="form-control" placeholder="MM" wire:model="exp_month">
                                                @error('exp_month')<span class="text-danger">{{$message}}</span>@enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label for="exp_year">Expiry year:</label>
                                                <input type="text" name="exp_year" id="exp_year" value="" class="form-control" placeholder="YY" wire:model="exp_year">
                                                @error('exp_year')<span class="text-danger">{{$message}}</span>@enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label for="cvc">CVC:</label>
                                                <input type="password" name="cvc" id="cvc" value="" class="form-control" placeholder="CVC" wire:model="cvc">
                                                @error('cvc')<span class="text-danger">{{$message}}</span>@enderror
                                            </p>
                                        </div>
                                    @endif
                                    <div class="custome-radio mt-5">
                                        <input type="radio" name="payment-method" id="payment-method-visa" value="card"  wire:model.defer="paymentmode">
                                        <label for="payment-method-visa" class="form-label"> Debit/Credit Card</label>
                                    </div>   
                                    <div class="custome-radio mt-5">
                                        <input type="radio" name="payment-method" id="payment-method-cod" value="cod" wire:model.defer="paymentmode">
                                        <label for="payment-method-cod" class="form-label"> Cash on delivery</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
