<aside class="sidebar-wrapper">
    <div class="logo-wrapper">
        <a href="{{ route('admin.dashboard')}}" class="admin-logo">
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="spo_logo_admin" class="sp_logo">
            <img src="{{asset('admin/assets/images/mini_logo.png')}}" alt="spo_mini_logo_admin" class="sp_mini_logo">
        </a>
    </div>
    <div class="side-menu-wrap">
        <ul class="main-menu">
            <li>
                <a href="javascript:void(0);" class="active">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </span>
                    <span class="menu-text">
                        Categories
                    </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('admin.categories') }}">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Categories
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.add_category') }}">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Add Category
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="active">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-voicemail"><circle cx="5.5" cy="11.5" r="4.5"></circle><circle cx="18.5" cy="11.5" r="4.5"></circle><line x1="5.5" y1="16" x2="18.5" y2="16"></line></svg>
                    </span>
                    <span class="menu-text">
                        Brands
                    </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('admin.brands') }}">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Available Brand
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.add_brand') }}">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Add Brand
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.products')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Products
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.users')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </span>
                    <span class="menu-text">
                        Customers
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.orders')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </span>
                    <span class="menu-text">
                        Orders
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.banners')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                    <span class="menu-text">
                        Banner
                    </span>
                </a>
            </li>
            
            <li>
                <a href="{{route('admin.home_page_categories')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid nav-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </span>
                    <span class="menu-text">
                        Home Page Categories
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.sale')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                    </span>
                    <span class="menu-text">
                        Sales Timmer
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.coupons')}}">
                    <span class="icon-menu feather-icon">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{fill:#dde5e8;}.cls-2{fill:#26294b;}.cls-3{fill:#26294b;}</style></defs><title>price-tag-1-flat</title><path class="cls-1" d="M435.4,0H296.2A76.11,76.11,0,0,0,242,22.44L22.44,242a76.59,76.59,0,0,0,0,108.32L161.63,489.56a76.59,76.59,0,0,0,108.33,0L489.56,270A76.08,76.08,0,0,0,512,215.79V76.6A76.69,76.69,0,0,0,435.4,0Zm-13,115.2A25.6,25.6,0,1,1,448,89.6,25.6,25.6,0,0,1,422.4,115.2Z"/><path class="cls-2" d="M358,237l-83-83a44.91,44.91,0,0,0-63.52,0L102.76,262.69h0a45,45,0,0,0,0,63.52l83,83a44.91,44.91,0,0,0,63.52,0L358,300.51A45,45,0,0,0,358,237Z"/><path class="cls-3" d="M294.4,281.6a12.75,12.75,0,0,1-9-3.75l-51.2-51.2a12.8,12.8,0,0,1,18.1-18.1l51.2,51.2a12.8,12.8,0,0,1-9.05,21.85Z"/><path class="cls-3" d="M256,320a12.75,12.75,0,0,1-9.05-3.75l-51.2-51.2a12.8,12.8,0,0,1,18.1-18.1l51.2,51.2A12.8,12.8,0,0,1,256,320Z"/><path class="cls-3" d="M217.6,358.4a12.75,12.75,0,0,1-9-3.75l-51.2-51.2a12.8,12.8,0,1,1,18.1-18.1l51.2,51.2a12.8,12.8,0,0,1-9.05,21.85Z"/></svg>
                    </span>
                    <span class="menu-text">
                        Coupon
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.messages')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </span>
                    <span class="menu-text">
                        Message
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.setting')}}">
                    <span class="icon-menu feather-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                    </span>
                    <span class="menu-text">
                        General Setting
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.add_attribute')}}">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                    </span>
                    <span class="menu-text">
                        Add Attribute
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>