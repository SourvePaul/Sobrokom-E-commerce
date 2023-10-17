<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{route('home')}}"><img src="{{ asset('assets/images')}}/{{$setting->mobile_logo}}" alt="mobile_logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="fa fa-arrow-up"></i>
                    <i class="fa fa-arrow-down"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fa fa-th">Browse Categories</span> 
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-dress"></i>Women's
                                    Clothing</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-tshirt"></i>Men's
                                    Clothing</a></li>
                            <li> <a href="{{route('shop-right-grid')}}"><i class="evara-font-smartphone"></i>
                                    Cellphones</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-desktop"></i>Computer &
                                    Office</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-cpu"></i>Consumer
                                    Electronics</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-home"></i>Home &
                                    Garden</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i
                                        class="evara-font-high-heels"></i>Shoes</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-teddy-bear"></i>Mother &
                                    Kids</a></li>
                            <li><a href="{{route('shop-right-grid')}}"><i class="evara-font-kite"></i>Outdoor
                                    fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('home')}}">Home</a>
                            {{-- <ul class="dropdown">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                            </ul> --}}
                        </li>
                        <li>
                            <a href="{{route('about')}}"></a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="{{route('shop')}}">shop</a>
                            <ul class="dropdown">
                                <li><a href="{{route('shop-right-grid')}}">Shop Grid – Right Sidebar</a></li>
                                <li><a href="{{route('shop')}}">Shop Grid – Left Sidebar</a></li>
                                <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                        <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                        <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-filter.html">Shop – Filter</a></li>
                                <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                <li><a href="shop-cart.html">Shop – Cart</a></li>
                                <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                <li><a href="shop-compare.html">Shop – Compare</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Best Collection</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Dresses</a></li>
                                        <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                        <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="shop-product-right.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Jackets</a></li>
                                        <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                        <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                        <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                        <li><a href="shop-product-right.html">Tablets</a></li>
                                        <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                        <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                <li><a href="blog-category-list.html">Blog Category List</a></li>
                                <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                        <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                        <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="{{ route('login') }}">login</a></li>
                                <li><a href="{{ route('register') }}">register</a></li>
                                <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="page-terms.html">Terms of Service</a></li>
                                <li><a href="page-404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="/conatct"> {{$setting->address}} </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}">Log In</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('register') }}">Sign Up</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">{{$setting->mobile}} </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="{{ $setting->facebook}}"><img src="{{ asset('assets/images/icon-facebook.svg') }}" alt=""></a>
                <a href="{{ $setting->twitter}}"><img src="{{ asset('assets/images/icon-twitter.svg') }}" alt=""></a>
                <a href="{{ $setting->instagram}}"><img src="{{ asset('assets/images/icon-instagram.svg') }}" alt=""></a>
                <a href="{{ $setting->instagram}}"><img src="{{ asset('assets/images/icon-instagram.svg') }}" alt=""></a>
                <a href="{{ $setting->youtube}}"><img src="{{ asset('assets/images/icon-youtube.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div>