<div>
    <div class="header-nav d-none d-lg-flex">
        <div class="main-categori-wrap d-none d-lg-block">
            <a class="categori-button-active" href="#">
                <span class="fi-rs-apps"></span> Категории товаров
            </a>
            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('product.category', ['slug'=>$category->slug]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
            <nav>
                <ul>
                    <li><a  href="/">Главная</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('shop') }}">Товары</a></li>
                    <li><a href="{{ route('policy') }}">Приватность</a></li>
                    <li><a href="{{ route('terms') }}">Правила </a></li>
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
</div>
