<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Responsive, Bootstrap, BS4">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"><!-- style -->
    <link rel="stylesheet" href="{{ url('assets/css/site.min.css')}}">
    <link rel="icon" href="{{ url('assets/images/logoo.png')}}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <!-- sweet alert -->
  <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>  

</head>

<body class="layout-row">
    <!-- ############ Aside START-->
    <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
        <div class="sidenav h-100 modal-dialog bg-light">
            <!-- sidenav top -->
            <div class="navbar">
                <!-- brand -->
                <div class="logo">
                    <a href="{{ url('admin/home') }}">
                        <img src="{{ url('assets/images/logoo.png') }}" alt="logo images" style="height: 100px;">
                    </a>
                </div>
                <!-- / brand -->
            </div><!-- Flex nav content -->
            <div class="flex scrollable hover">
                <div class="nav-active-text-primary" data-nav>
                    <ul class="nav bg">
                        <li><a href="{{ url('/') }}"><span class="nav-icon text-primary"><i
                                        data-feather="globe"></i></span> <span class="nav-text">Website</span></a></li>
                        <li class="nav-header hidden-folded"><span class="text-muted">Mic Ride</span></li>
                        <li><a href="{{ url('admin') }}"><span class="nav-icon text-primary"><i
                                        data-feather="home"></i></span> <span class="nav-text">Dashboard</span></a></li>
                        <li class="nav-header hidden-folded"><span class="text-muted">News</span></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownOne" data-toggle="dropdown"><span class="nav-icon text-success"><i
                                        data-feather="info"></i></span> <span class="nav-text">Blogs</span></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ url('admin/category-blogs') }}">Category Blogs</a>
                                <a class="dropdown-item" href="{{ url('admin/blogs') }}">Blogs</a>
                            </div>
                        </li>
                        <li class="nav-header hidden-folded"><span class="text-muted">Products</span></li>
                        <li><a href="{{ url('admin/brand') }}"><span class="nav-icon text-success"><i
                                        data-feather="life-buoy"></i></span> <span class="nav-text">Brands</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownMenuLink" data-toggle="dropdown"><span class="nav-icon text-success"><i
                                        data-feather="layers"></i></span> <span class="nav-text">Products</span></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ url('admin/product_categorie') }}">Category
                                    Products</a>
                                <a class="dropdown-item" href="{{ url('admin/product') }}">Products</a>
                            </div>
                        </li>
                        <li class="nav-header hidden-folded"><span class="text-muted">Users</span></li>
                        <li><a href=""><span class="nav-icon text-primary"><i
                                        data-feather="users"></i></span> <span class="nav-text">Users</span></a></li>
                        <li><a href="{{ url('admin/slide') }}"><span class="nav-icon text-primary"><i
                                        data-feather="sliders"></i></span> <span class="nav-text">Slides</span></a></li>
                        <li><a href=""><span class="nav-icon text-primary"><i
                                        data-feather="map"></i></span> <span class="nav-text">Info</span></a></li>
                    </ul>

                </div>
            </div><!-- sidenav bottom -->
        </div>
    </div><!-- ############ Aside END-->
    <div id="main" class="layout-column flex">
        <!-- ############ Header START-->
        <div id="header" class="page-header">
            <div class="navbar navbar-expand-lg">
                <!-- brand --> <a href="index.html" class="navbar-brand d-lg-none">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path
                                d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z">
                            </path>
                        </g>
                    </svg>
                    <span class="hidden-folded d-inline l-s-n-1x d-lg-none">Basik</span> </a><!-- / brand -->
                <!-- Navbar collapse -->
                <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
                    <form class="input-group m-2 my-lg-0">
                        <div class="input-group-prepend"><button type="button"
                                class="btn no-shadow no-bg px-0 text-inherit"><i data-feather="search"></i></button>
                        </div><input type="text" class="form-control no-border no-shadow no-bg typeahead"
                            placeholder="Search components..." data-plugin="typeahead"
                            data-api="../assets/api/menu.json">
                    </form>
                </div>
                <ul class="nav navbar-menu order-1 order-lg-2">
                    <!-- User dropdown menu -->
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color">
                            <span class="avatar w-24" style="margin: -2px">
                                <img src="{{ Auth::user()->image }}" alt="...">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
                            <a class="dropdown-item" href="page.profile.html">
                                <span> {{ Auth::user()->name }}</span>
                            </a>
                            <a class="dropdown-item" href="page.setting.html">
                                <span>Account Settings
                                </span>
                            </a>
                            <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Sign out') }}
                            </a>
                        </div>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li><!-- Navarbar toggle btn -->
                    <li class="nav-item d-lg-none"><a href="#" class="nav-link px-2" data-toggle="collapse"
                            data-toggle-class data-target="#navbarToggler"><i data-feather="search"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link px-1" data-toggle="modal" data-target="#aside"><i
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
        </div><!-- ############ Footer END-->
        <!-- ############ Footer START-->
        <div id="footer" class="page-footer hide">
            <div class="d-flex p-3"><span class="text-sm text-muted flex">&copy; Copyright. flatfull.com</span>
                <div class="text-sm text-muted">Version 1.1.2</div>
            </div>
        </div><!-- ############ Footer END-->

        @yield('container')

    </div>
    <script src="{{ url('assets/js/site.min.js') }}"></script>

    <script>
    //sweetalert for success or error message
    @if(session()->has('success'))
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
        @elseif(session()->has('error'))
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
