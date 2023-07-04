<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Surfside Media</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
</head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                        <a href="http://twitter.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                        <a href="https://instagram.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                        <a href="https://www.pinterest.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                        <a href="https://www.youtube.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Приобретайте отличные товары со скидкой до 50%</li>
                                <li>Выгодные предложения</li>
                                <li>Экономте вместе с нами</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        @auth
                            <ul>
                                <li><i class="fi-rs-user"></i> {{ Auth::user()->name }} /
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); this.closest('form').submit()">Выйти</a>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <ul>
                                <li><i class="fi-rs-user"></i><a href="{{ route('login') }}">Войти </a> / <a
                                        href="{{ route('register') }}">Зарегистрироваться</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src=" {{asset('assets/imgs/logo/logo.png')}} " alt="logo"></a>
                </div>
                <div class="header-right">
                @livewire('header-search-component')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @livewire('wish-list-icon-component')
                            @livewire('cart-icon-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dresses</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blouses
                                                                    & Shirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Hoodies
                                                                    & Sweatshirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Women's
                                                                    Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits
                                                                    & Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bodysuits</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tanks
                                                                    & Camis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Coats
                                                                    & Jackets</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Bottoms</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leggings</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Skirts</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Shorts</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jeans</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Pants
                                                                    & Capris</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bikini
                                                                    Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Swimwear</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-2.jpg') }}" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-3.jpg') }}" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Jackets & Coats</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Down
                                                                    Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jackets</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Parkas</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Faux
                                                                    Leather Coats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Trench</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wool
                                                                    & Blends</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests
                                                                    & Waistcoats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leather
                                                                    Coats</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Suits & Blazers</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blazers</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit
                                                                    Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit
                                                                    Pants</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tailor-made
                                                                    Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="assets/imgs/banner/menu-banner-4.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="{{ route('shop') }}">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cellphones</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">iPhones</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Refurbished
                                                                    Phones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile
                                                                    Phone</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile
                                                                    Phone Parts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Phone
                                                                    Bags & Cases</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Communication
                                                                    Equipments</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Walkie
                                                                    Talkie</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Accessories</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Screen
                                                                    Protectors</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wire
                                                                    Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wireless
                                                                    Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Car
                                                                    Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Power
                                                                    Bank</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Armbands</a>
                                                            </li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dust
                                                                    Plug</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Signal
                                                                    Boosters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="assets/imgs/banner/menu-banner-5.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="assets/imgs/banner/menu-banner-6.jpg" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Jewelry & Accessories</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                                <li>
                                    <ul class="more_slide_open" style="display: none;">
                                        <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a>
                                        </li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a>
                                        </li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer
                                                Electronics</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles &
                                                Motorcycles</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="more_categories">Show more...</div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a  href="/">Главная</a></li>
                                <li><a href="{{ route('about') }}">О нас</a></li>
                                <li><a href="{{ route('shop') }}">Товары</a></li>
                                <li><a href="blog.html">Blog </a></li>
                                <li><a href="blog.html">Blog </a></li>
                                <li><a href="contact.html">Контакты</a></li>
                                @auth
                                    @if(Auth::user()->utype == 'ADM')
                                        <li><a href="#">Профиль<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('admin.dashboard') }}">Панель</a></li>
                                                <li><a href="{{ route('admin.products') }}">Товары</a></li>
                                                <li><a href="{{ route('admin.categories') }}">Категории</a></li>
                                                <li><a href="{{ route('admin.home.slider') }}">Слайдер</a></li>
                                            </ul>
                                    @else
                                        <li><a href="#">Профиль<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Звонок бесплатный</span> (+7) 978-00-00-000 </p>
                </div>
            </div>
        </div>
    </div>
</header>

{{ $slot }}

<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                            <strong>Адресс: </strong>г. Москва
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Телефон: </strong>+7 978-00-00-000
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong>admin@mail.ru
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Соц сети</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="http://twitter.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                            <a href="https://instagram.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                            <a href="https://www.pinterest.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                            <a href="https://www.youtube.com/"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title wow fadeIn animated">About</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">My Account</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="my-account.html">My Account</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Order</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mob-center">
                    <h5 class="widget-title wow fadeIn animated">Install App</h5>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <p class="wow fadeIn animated">From App Store or Google Play</p>
                            <div class="download-app wow fadeIn animated mob-app">
                                <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                                                                  src="{{ asset('assets/imgs/theme/app-store.jpg') }}"
                                                                                  alt=""></a>
                                <a href="#" class="hover-up"><img src="{{ asset('assets/imgs/theme/google-play.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                            <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms &
                        Conditions</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    &copy; <strong class="text-brand">SurfsideMedia</strong> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
</body>
@livewireScripts
@stack('scripts')

</html>
