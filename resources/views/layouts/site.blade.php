<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('asset/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/themify/themify-icons.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/elegant-font/html-css/style.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/lightbox2/css/lightbox.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/main.css')}}">
	<script src="{{ asset('asset/jquery-3.7.1.min.js')}}"></script>
<!--===============================================================================================-->
<style>
    .header-search .form-control {
        width: 200px;
        border-radius: 20px 0 0 20px;
        border: 1px solid #000;
        padding: 10px 15px;
        outline: none;
    }

    .header-search .search-button {
        border-radius: 0 20px 20px 0;
        border: 1px solid #000;
        border-left: none;
        background-color: #000;
        color: #fff;
        padding: 10px 15px;
        cursor: pointer;
    }

    .header-search .form-control:focus {
        border-color: #f8ad0c; /* Màu viền khi ô tìm kiếm được focus */
    }

    .header-search .search-button:hover {
        background-color: #7863b3; /* Màu nền khi hover vào nút tìm kiếm */
    }

    .header-search .search-button i {
        font-size: 18px;
        color: #fff;
    }

    /* Để tùy chỉnh viền của search-input */
    .header-search{
        border: 1px solid #000;
        border-color: #000;
        border-radius: 20px; /* Bo tròn viền */
    }
</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Miễn phí vận chuyển cho đơn hàng tiêu chuẩn trên 1000k
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						fashe@gmail.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>VND</option>
							<option>USD</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="{{ route('site.home') }}" class="logo">
					<img src="{{ asset('asset/images/icons/logo.png')}}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<x-main-menu/>

                <!-- Search Form -->
                <div class="header-search">
                    <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
                        <input class="form-control search-input" type="search" name="query" placeholder="Tìm kiếm..." aria-label="Search">
                        <button class="btn search-button" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

				<!-- Header Icon -->
				<div class="header-icons">
                    @if (Auth::check())
                    @php
                        $user = Auth::user();
                    @endphp
                        <a href="{{ route('auth.logout') }}" class="header-wrapicon1 dis-block">
                            <img src="{{ asset('asset/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                            <span>{{ $user->name }}</span>
                        </a>

					@else
                    <a href="{{ route('auth.getlogin') }}" class="header-wrapicon1 dis-block">
                        <img src="{{ asset('asset/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">

                    </a>
                    @endif

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{{ asset('asset/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						@php
							$cart = session('cart', []);
							$count = is_array($cart) && count($cart) > 0 ? count($cart) : 0;
						@endphp
						<span class="header-icons-noti" id="showcount">{{ $count }}</span>

						<!-- Header cart noti -->
						<x-cart-noti/>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{ route('site.home') }}" class="logo-mobile">
				<img src="{{ asset('asset/images/icons/logo.png')}}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="{{ asset('asset/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{ asset('asset/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						@php
							$cart = session('cart', []);
							$count = is_array($cart) && count($cart) > 0 ? count($cart) : 0;
						@endphp
						<span class="header-icons-noti" id="showcount">{{ $count }}</span>


						<!-- Header cart noti -->
						<x-cart-noti/>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
        <x-main-menu-mobile/>
	</header>

	@yield('section')


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					<a href="{{ route('site.home') }}">
                        <img src="{{ asset('asset/images/icons/logo.png')}}" alt="IMG-LOGO">
                    </a>
				</h4>

				<div>
					<ul class="list-footer">
                        <li>
                            <a href="{{ route('site.about') }}" title="gioi thieu">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="{{ route('site.contact') }}" title="lien he">Liên hệ</a>
                        </li>
                        <li>
                            <a href="#" title="tuyen dung">Tuyển dụng</a>
                        </li>
                        <li>
                            <a href="#" title="tin tuc FASHE">Tin tức</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <ul class="list-footer-contact">
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            Email: <a href="mailto:fashe@gmail.com" rel="nofollow" title="FASHE EMAIL">fashe@gmail.com</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            Hotline: <a href="tel:0702775390" rel="nofollow" title="FASHE HOTLINE" track="Phone-Footer-0702775390">0702775390</a>
                        </li>
                    </ul>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Hỗ trợ khách hàng
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="{{ route('site.aboutcart.index') }}" class="s-text7">
							Chính sách mua hàng
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{ route('site.baohanh') }}" class="s-text7">
							Chính sách bảo hành
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{ route('site.vanchuyen') }}" class="s-text7">
							Chính sách vận chuyển
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{ route('site.doitra') }}" class="s-text7">
							Chính sách đổi trả
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Đăng ký nhận email khuyến mãi
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Đăng kí
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{{ asset('asset/images/icons/paypal.png')}}" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('asset/images/icons/visa.png')}}" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('asset/images/icons/mastercard.png')}}" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('asset/images/icons/express.png')}}" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('asset/images/icons/discover.png')}}" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright 2024 · Thiết kế và phát triển bởi Fashe Shop | All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

    @yield('script')

</body>
</html>
