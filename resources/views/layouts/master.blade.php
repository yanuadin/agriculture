<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('orgafe\img\favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('orgafe\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\dripicons.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\slick.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\default.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\style.css') }}">
    <link rel="stylesheet" href="{{ asset('orgafe\css\responsive.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-lte3/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin-lte3/plugins/toastr/toastr.min.css') }}">
</head>
<body>
<header class="header-transparent">
    <div id="sticky-header" class="main-menu-area mt-20">
        <div class="container">
            <div class="row pt-1 pb-3">
                <div class="col-xl-3 col-lg-3 d-flex align-items-center">
                    <div class="logo">
                        <a href="{{ route('front-page') }}"><img src="{{ asset('img/konco-tani.png') }}" alt="" style="width: 135px; height: 47px"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="row">
                        <div class="col-md">
                            <div class="header-right f-right d-none d-md-block" id="top-header">
                                <ul>
                                    <li class="unser-icon dropdown">
                                        <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-user"></i>
                                        </a>

                                        @if(Auth::user())
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-left" href="{{ route('logout') }}">
                                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                                </a>
                                            </div>
                                        @else
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item text-left" href="{{ route('login.form') }}"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                                <a class="dropdown-item text-left" href="{{ route('register.form') }}"><i class="fas fa-pen-square mr-2"></i>Register</a>
                                            </div>
                                        @endif
                                    </li>
                                    @if(Auth::user())
                                        <li class="cart-icon"><a href="{{ route('detail-cart') }}"><i class="dripicons-cart"></i></a>
                                            <span>{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md">
                            <div class="main-menu f-right">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="{{ route('front-page') }}">home</a></li>
                                        <li><a href="#about">about</a></li>
                                        <li><a href="#product">product</a></li>
                                        <li><a href="#blog">blog</a></li>
                                        <li><a href="#contact">contact</a></li>
                                        <li><a href="{{ route('order') }}">pesanan anda</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-start -->

<main>

    @yield('content')

    <!-- footer-area-start -->
    <footer>
        <div class="footer-area pt-95 pb-95" style="background-image:url({{ asset('orgafe/img/bg/bg5.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset('img/konco-tani.png') }}" alt="" style="width: 135px; height: 47px"></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor amet coadipisicing
                                    elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut.</p>
                            </div>
                            <div class="footer-icon">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper pl-40 mb-30">
                            <div class="footer-title">
                                <h4>Customer Support</h4>
                            </div>
                            <ul class="fotter-menu">
                                <li><a href="#">Help and Ordering</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Return &amp; Cancellation</a></li>
                                <li><a href="#">Delevery Schedule</a></li>
                                <li><a href="#">Get a Call</a></li>
                                <li><a href="#">Online Enquiry</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper pl-35 mb-30">
                            <div class="footer-title">
                                <h4>Contact Info</h4>
                            </div>
                            <ul class="fotter-link">
                                <li>
                                    <h5><i class="far fa-paper-plane"></i> Location</h5>
                                    <p>205 Olazu Familia, Herba <br> Street Front USA</p>
                                </li>
                                <li>
                                    <h5><i class="far fa-envelope-open"></i> Email us</h5>
                                    <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0c7f797c7c637e784c6b616d6560226f6361">[email&#160;protected]</a></p>
                                </li>
                                <li>
                                    <h5><i class="fas fa-headphones"></i> Call Us</h5>
                                    <p>002- 01008431112</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper pl-45 mb-30">
                            <div class="footer-title">
                                <h4>our Gallery</h4>
                            </div>
                            <ul class="footer-img">
                                <li>
                                    <a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram1.jpg') }}"> </a>
                                </li>
                                <li><a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram2.jpg') }}"></a></li>
                                <li><a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram3.jpg') }}"></a></li>
                                <li><a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram4.jpg') }}"></a></li>
                                <li><a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram5.jpg') }}"></a></li>
                                <li><a href="#"><img alt="" src="{{ asset('orgafe\img\instagram\instagram6.jpg') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom pt-35">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="copyright">
                                <p> Copyright <i class="far fa-copyright"></i> 2019 <a href="#">BDevs.</a> All Rights Reserved </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <ul class="footer-bottom-link text-lg-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Product</a></li>
                                <li><a href="#">Farmers</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->
</main>

<!-- JS here -->
<script src="{{ asset('orgafe\js\vendor\modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('orgafe\js\vendor\jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('orgafe\js\popper.min.js') }}"></script>
<script src="{{ asset('orgafe\js\bootstrap.min.js') }}"></script>
<script src="{{ asset('orgafe\js\jquery.counterup.min.js') }}"></script>
<script src="{{ asset('orgafe\js\jquery.countdown.min.js') }}"></script>
<script src="{{ asset('orgafe\js\waypoints.min.js') }}"></script>
<script src="{{ asset('orgafe\js\owl.carousel.min.js') }}"></script>
<script src="{{ asset('orgafe\js\isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('orgafe\js\slick.min.js') }}"></script>
<script src="{{ asset('orgafe\js\jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('orgafe\js\ajax-form.js') }}"></script>
<script src="{{ asset('orgafe\js\wow.min.js') }}"></script>
<script src="{{ asset('orgafe\js\jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('orgafe\js\imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('orgafe\js\jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('orgafe\js\plugins.js') }}"></script>
<script src="{{ asset('orgafe\js\main.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin-lte3/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin-lte3/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('admin-lte3/plugins/toastr/toastr.min.js') }}"></script>
<script !src="">
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
</script>
</body>
</html>
