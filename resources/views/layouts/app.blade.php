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
                @livewire('header-navigation-component')
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
                <div class="col-lg-6 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Контакты</h5>
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
                <div class="col-lg-6 col-md-6">
                    <h5 class="widget-title wow fadeIn animated">Покупателям</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="{{ route('about') }}">О нас</a></li>
                        <li><a href="{{ route('policy') }}">Политика конфиденциальности</a></li>
                        <li><a href="{{ route('terms') }}">Правила и условия</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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
