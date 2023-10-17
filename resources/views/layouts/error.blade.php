<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>ADMIN | SOBROKOM</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/icofont.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
	<link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/assets/images/favicon.svg')}}">
    @livewireStyles
</head>

<body>
    <div class="loader">
	  <div class="spinner">
		<img src="{{asset('admin/assets/images/loader.gif')}}" alt=""/>
	  </div> 
	</div>

        {{-- Main Section --}}
            {{$slot}}

        {{-- start color setting --}}
            <div id="style-switcher">
                <div>
                    <ul class="colors">
                        <li>
                            <p class='colorchange' id='color'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color2'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color3'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color4'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color5'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='style'>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        <!-- Color Setting -->
	
	
    <!-- Script Start -->
	<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/apexchart/control-chart-apexcharts.js')}}"></script>
	<!-- Page Specific -->
    <script src="{{asset('admin/assets/js/nice-select.min.js')}}"></script>
    <!-- Custom Script -->
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    @livewireScripts
</body>

</html>