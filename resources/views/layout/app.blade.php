<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.devitems.com/boighor-v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Oct 2020 14:27:44 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ url('assets/images/logoo.png') }}">
    <link rel="icon" href="{{ url('assets/images/logoo.png')}}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="{{ url('assets/fonts.googleapis.com/css0f7c.css?family=Open+Sans:300,400,600,700,800')}}" rel="stylesheet">
    <link href="{{ url('assets/fonts.googleapis.com/css096e.css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800')}}" rel="stylesheet">
    <link href="{{ url('assets/fonts.googleapis.com/cssc8ca.css?family=Roboto:100,300,400,500,700,900')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ url('assets/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ url('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
</head>

<body>
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        <header id="wn__header" class="header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ url('assets/images/logoo.png') }}" height="60px" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li><a href="{{ url('/') }}">Home</a>
                                </li>
                                <li><a href="{{ url('/brands') }}">Brands</a>
                                </li>
                                <li><a href="{{ url('/parts/bycategory/6') }}">Complete Bikes</a>
                                </li>
                                <li><a href="{{ url('/parts/bycategory/7') }}">Frames</a>
                                </li>
                                <li><a href="{{ url('/parts') }}">Parts</a>
                                </li>
                                <li><a href="{{ url('/parts/bycategory/8') }}">Safety Gear</a>
                                </li>
                                <li><a href="{{ url('/news') }}">News</a></li>
                                <li><a href="{{ url('/info') }}">Info</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shop_search"><a class="search__active" href="#"></a></li>
                            <li class="wishlist"><a href="{{ url('/wishlist') }}"></a></li>
                            @guest

                            @if (Route::has('register'))

                            @endif
                            @else
                            <li class="shopcart"><a class="cartbox_active" href="#">
                                    <span class="product_qun">{{ $count }}</span></a>
                                <!-- Start Shopping Cart -->
                                <div class="block-minicart minicart__active">

                                    <div class="minicart-content-wrapper">
                                        <div class="micart__close">
                                            <span>close</span>
                                        </div>
                                        <div class="single__items">
                                            @forelse ($carts as $cart)
                                            <div class="miniproduct">
                                                <div class="item01 d-flex">
                                                    <div class="thumb">
                                                        <a href="{{ url('parts', $cart->slug) }}"><img src="{{ $cart->image }}" alt="product images"></a>
                                                    </div>
                                                    <div class="content">
                                                        <h6><a href="{{ url('parts', $cart->slug) }}"></a></h6>
                                                        <span class="prize">Rp {{ number_format($cart->price, 0. ) }}</span>
                                                        <div class="product_prize d-flex justify-content-between">
                                                            <span class="qun">Qty: {{ $cart->qty_cart }}</span>
                                                            <ul class="d-flex justify-content-end">
                                                                <li><a href="{{ url('/delete', $cart->id) }}"><i class="zmdi zmdi-delete"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="miniproduct">
                                                <div class="item01 d-flex">
                                                    <div class="content">
                                                        <div class="page-content page-container" id="page-content">
                                                            <div class="padding">
                                                                <div class="text-center">
                                                                    <div class="block d-inline-flex">
                                                                        <div class="p-4 p-sm-5"><sup class="text-sm" style="top: -0.5em"></sup><span class="h1"><i class="fa fa-shopping-cart"></i></span>
                                                                            <div class="text-muted">Empty Cart</div>
                                                                            <div class="py-4"><a href="{{ url('parts') }}" class="btn btn-sm btn-rounded btn-info">Shop</a>
                                                                            </div><small class="text-muted">select items to add cart</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="p-5 text-center">Everything you need to make a bike is right here.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class="mini_action cart">
                                            <a class="cart__btn" href="{{ url('/cart') }}">View and edit cart</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Shopping Cart -->
                            </li>
                            @endguest
                            <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                                <div class="searchbar__content setting__block">
                                    <div class="content-inner">
                                        <div class="switcher-currency">
                                            <strong class="label switcher-label">
                                                <span>My Account</span>
                                            </strong>
                                            <div class="switcher-options">
                                                <div class="switcher-currency-trigger">
                                                    <div class="setting__menu">
                                                        <!-- <span><a href="#">My Account</a></span> -->
                                                        <!-- <span><a href="#">My Wishlist</a></span> -->
                                                        @guest
                                                        <span><a href="{{ url('/login') }}">Sign In</a></span>
                                                        <span><a href="{{ url('/register') }}">Create An
                                                                Account</a></span>
                                                        @else
                                                        <span>
                                                            <a href="{{ url('users/profile') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                {{ Auth::user()->name }}
                                                            </a>
                                                        </span>
                                                        <span>
                                                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                        </span>

                                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                            </li>
                            @endguest
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <!-- Start Mobile Menu -->
    <div class="row d-none">
        <div class="col-lg-12 d-none">
            <nav class="mobilemenu__nav">
                <ul class="meninmenu">
                    <li><a href="">Home</a>
                    </li>
                    <li><a href="">Brands</a>
                    </li>
                    <li><a href="">Complete Bikes</a>
                    </li>
                    <li><a href="">Frames</a>
                    </li>
                    <li><a href="">Parts</a></li>
                    <li><a href="">Safety Gear</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">Info</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Mobile Menu -->
    <div class="mobile-menu d-block d-lg-none">
    </div>
    <!-- Mobile Menu -->
    </div>
    </header>
    <!-- //Header -->

    @yield('container')

    <!-- Footer Area -->
    <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
        <div class="footer-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__widget footer__menu">
                            <div class="ft__logo">
                                <a href="index.html">
                                    <img src="{{ url('assets/images/logoo.png') }}" alt="logo">
                                </a>
                            </div>
                            <div class="footer__content">
                                <ul class="social__net social__net--2 d-flex justify-content-center">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                </ul>
                                <ul class="mainmenu d-flex justify-content-center">
                                    <li><a href="{{ url('/brands') }} ">Brands</a></li>
                                    <li><a href="{{ url('/completebikes') }} ">Complete Bikes</a></li>
                                    <li><a href="{{ url('/frames') }} ">Frames</a></li>
                                    <li><a href="{{ url('/parts') }} ">Parts</a></li>
                                    <li><a href="{{ url('/safetygear') }} ">Safety Gear</a></li>
                                    <li><a href="{{ url('/news') }} ">News</a></li>
                                    <li><a href="{{ url('/info') }} ">Info</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="copyright">
                            <div class="copy__right__inner text-left">
                                <p>Copyright <i class="fa fa-copyright"></i> <a href="#">MicRide.</a> All Rights
                                    Reserved</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="{{ url('assets/images/icons/payment.png') }}" alt="" />
							</div>
						</div> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- //Footer Area -->
    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="{{ url('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/active.js') }}"></script>

    <script>
        //sweetalert for success or error message
        @if(session() -> has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session() -> has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
    </script>

</body>

</html>