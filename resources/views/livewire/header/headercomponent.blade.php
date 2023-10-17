@php
$setting=DB::table('home_page_settings')->first();
@endphp
@if($setting)
<header class="header-area header-style-3 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fa fa-mobile"></i> <a href="#">{{$setting->mobile}}</a></li>
                            <li><i class="fa fa-map-marker"></i><a href="#">{{$setting->address}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="/shop">View details</a>
                                </li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="/shop">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="#"> <i class="fa fa-globe"></i> English <i class="fa fa-angle-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-fr.png') }}" alt="">Français</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-dt.png') }}" alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-ru.png') }}" alt="">Pусский</a></li>
                                </ul>
                            </li>
                            <li>
                                <i class="fa fa-user"></i><a href="{{ route('register') }}">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('home')}}"><img src="{{ asset('assets/images')}}/{{ $setting->web_logo}}" alt="logo"></a>
                </div>
                <div class="header-right">
                    @livewire("header-search-component")

                    <div class="header-action-right">
                        <div class="header-action-2">
                            @livewire("compare-count-component")
                            @livewire("wishlist-count-component")
                            @livewire("cart-count-component")
                            @if(Route::has('login'))
                            @auth
                            @if(Auth::user()->utype ==='USR')
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img class="svgInject" alt="Sobrokom_user" src="{{asset('assets/images/user.png')}}" />
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user mr-10"></i>{{Auth::user()->name}} Dashboard</a></li>
                                        <li><a href="{{route('user.orders')}}"><i class="fa fa-first-order mr-10"></i>Manage Order</a></li>
                                        <li><a href="{{route('user_change.password')}}"><i class="fa fa-lock mr-10"></i>Edit Password</a></li>
                                        <li>
                                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out mr-10"></i> Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" method="post" action="{{route('logout')}}">
                                            @csrf
                                        </form>

                                    </ul>
                                </div>
                            </div>

                            @elseif(Auth::user()->utype ==='ADM')

                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets/images/user.png')}}" />
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user mr-10"></i>{{Auth::user()->name}} Dashboard</a></li>
                                        <li>
                                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out mr-10"></i> Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" method="post" action="{{route('logout')}}">
                                            @csrf
                                        </form>

                                    </ul>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img class="svgInject" alt="sobrokom_user" src="{{asset('assets/images/user.png')}}" />
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href="{{route('login')}}"><i class="fa fa-user mr-10"></i>Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endauth
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative  main-nav">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{route('home')}}"><img src="{{ asset('assets/images') }}/{{$setting->web_logo}}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    @livewire("menu-categories-component")
                    @livewire("menu-component")
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fa fa-headphones"></i><span>Hotline</span> {{$setting->hotline}} </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                </p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Sobrokom" src="{{ asset('assets/images/icon-heart.svg') }}">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="Sobrokom" src="{{ asset('assets/images/icon-cart.svg') }}">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="Sobrokom" src="{{ asset('assets/images/thumbnail-3.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>&#2547; 800</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="Sobrokom"
                                                    src="{{ asset('assets/images/thumbnail-4.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>&#2547; 3500</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>&#2547; 383</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="#">View cart</a>
                                        <a href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@else
<header class="header-area header-style-3 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fa fa-smartphones"></i> <a href="#">(+01) - 2345 - 6789</a></li>
                            <li><i class="fa fa-map-marker"></i><a href="#">Our location</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="/shop">View details</a>
                                </li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today 
                                    <a href="/shop">Shop now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="#"> <i class="fa fa-globe"></i> English <i
                                        class="fa fa-angle-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-fr.png') }}" alt="">Français</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-dt.png') }}" alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/flag-ru.png') }}" alt="">Pусский</a></li>
                                </ul>
                            </li>
                            <li>
                                <i class="fa fa-user"></i><a href="{{ route('register') }}">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('home')}}"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="header-right">
                    @livewire("header-search-component")
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @livewire("wishlist-count-component")
                            @livewire("cart-count-component")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative  main-nav">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{route('home')}}"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    @livewire("menu-categories-component")
                    @livewire("menu-component")
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fa fa-headset"></i><span>Hotline</span> 1900 - 888 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                </p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="sobrokom" src="{{ asset('assets/images/icon-heart.svg') }}">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="sobrokom" src="{{ asset('assets/images/icon-cart.svg') }}">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="sobrokom"
                                                    src="{{ asset('assets/images/thumbnail-3.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>&#2547; 800</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="sobrokom"
                                                    src="{{ asset('assets/images/thumbnail-4.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>&#2547; 3500</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>&#2547; 383</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endif