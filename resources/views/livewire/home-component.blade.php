<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach($slides as $slide)
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{ $slide->top_title }}</h4>
                                        <h2 class="animated fw-900">{{ $slide->title }}</h2>
                                        <h1 class="animated fw-900 text-brand">{{ $slide->sub_title }}</h1>
                                        <p class="animated">{{ $slide->offer }}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="{{ $slide->link }}"> Shop
                                            Now </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated slider-1-1"
                                             src="{{ asset('assets/imgs/slider') }}/{{ $slide->image }}"
                                             alt="{{ $slide->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-1.png') }}" alt="">
                            <h4 class="bg-1">Бесплатная доставка</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-2.png') }}" alt="">
                            <h4 class="bg-3">Онлаин заказ</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                            <h4 class="bg-2">Экономия денег</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                            <h4 class="bg-4">Акции</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                            <h4 class="bg-5">Легкя покупка</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                            <h4 class="bg-6">Поддержка 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true">Рекомендуемые
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                    type="button" role="tab" aria-controls="tab-two" aria-selected="false">Распродажа
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                    type="button" role="tab" aria-controls="tab-three" aria-selected="false">Новые
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-four"
                                    type="button" role="tab" aria-controls="tab-four" aria-selected="false">Ограниченный
                                тираж
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-five"
                                    type="button" role="tab" aria-controls="tab-five" aria-selected="false">Предложение
                                дня
                            </button>
                        </li>
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($featuredProducts as $fproduct)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug'=>$fproduct->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $fproduct->image }}"
                                                         alt="" height="280" width="280">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.category', ['slug'=>$fproduct->category->slug]) }}">{{ $fproduct->category->name }}</a>
                                            </div>
                                            <div class="product-price">
                                                <span><a href="{{ route('label', $fproduct->label->slug) }}">{{ $fproduct->label->name }}</a></span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('product.details', ['slug'=>$fproduct->slug]) }}">{{ $fproduct->name }}</a>
                                            </h2>
                                            <div>
                                                @if($fproduct->sale !==0)
                                                    <span>
                                                    <span>Скидка {{ $fproduct->sale }}%</span>
                                                </span>
                                                @else
                                                    <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if($fproduct->sale !==0)
                                                    <span>
                                                    ${{ $fproduct->sale_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $fproduct->regular_price }}
                                                </span>
                                                @else
                                                    <span>${{ $fproduct->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{$fproduct->id}}, '{{ $fproduct->name }}', {{ $fproduct->sale_price }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            @foreach($salesProducts as $sproduct)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug'=>$sproduct->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $sproduct->image }}"
                                                         alt="" height="280" width="280">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.category', ['slug'=>$sproduct->category->slug]) }}">{{ $sproduct->category->name }}</a>
                                            </div>
                                            <div class="product-price">
                                                <span><a href="{{ route('label', $sproduct->label->slug) }}">{{ $sproduct->label->name }}</a></span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('product.details', ['slug'=>$sproduct->slug]) }}">{{ $sproduct->name }}</a>
                                            </h2>
                                            <div>
                                                @if($sproduct->sale !==0)
                                                    <span>
                                                    <span>Скидка {{ $sproduct->sale }}%</span>
                                                </span>
                                                @else
                                                    <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if($sproduct->sale !==0)
                                                    <span>
                                                    ${{ $sproduct->sale_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $sproduct->regular_price }}
                                                </span>
                                                @else
                                                    <span>${{ $sproduct->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{$sproduct->id}}, '{{ $sproduct->name }}', {{ $sproduct->regular_price }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two (Popular)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">
                            @foreach($latestProducts as $lproduct)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug'=>$lproduct->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $lproduct->image }}"
                                                         alt="" height="280" width="280">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.category', ['slug'=>$lproduct->category->slug]) }}">{{ $lproduct->category->name }}</a>
                                            </div>
                                            <div class="product-price">
                                                <span><a href="{{ route('label', $lproduct->label->slug) }}">{{ $lproduct->label->name }}</a></span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('product.details', ['slug'=>$lproduct->slug]) }}">{{ $lproduct->name }}</a>
                                            </h2>
                                            <div>
                                                @if($lproduct->sale !==0)
                                                    <span>
                                                    <span>Скидка {{ $lproduct->sale }}%</span>
                                                </span>
                                                @else
                                                    <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if($lproduct->sale !==0)
                                                    <span>
                                                    ${{ $lproduct->sale_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $lproduct->regular_price }}
                                                </span>
                                                @else
                                                    <span>${{ $lproduct->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{$lproduct->id}}, '{{ $lproduct->name }}', {{ $lproduct->regular_price }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (New added)-->
                    <div class="tab-pane fade" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                        <div class="row product-grid-4">
                            @foreach($limitedProducts as $limproduct)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug'=>$limproduct->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $limproduct->image }}"
                                                         alt="" height="280" width="280">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="limit">limited</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.category', ['slug'=>$limproduct->category->slug]) }}">{{ $limproduct->category->name }}</a>
                                            </div>
                                            <div class="product-price">
                                                <span><a href="{{ route('label', $limproduct->label->slug) }}">{{ $limproduct->label->name }}</a></span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('product.details', ['slug'=>$limproduct->slug]) }}">{{ $limproduct->name }}</a>
                                            </h2>
                                            <div>
                                                @if($limproduct->sale !==0)
                                                    <span>
                                                    <span>Скидка {{ $limproduct->sale }}%</span>
                                                </span>
                                                @else
                                                    <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if($limproduct->sale !==0)
                                                    <span>
                                                    ${{ $limproduct->sale_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $limproduct->regular_price }}
                                                </span>
                                                @else
                                                    <span>${{ $limproduct->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{$limproduct->id}}, '{{ $limproduct->name }}', {{ $limproduct->regular_price }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <div class="tab-pane fade" id="tab-five" role="tabpanel" aria-labelledby="tab-five">
                        <div class="row product-grid-4">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug'=>$oneLimitedProduct->slug]) }}">
                                                <img class="default-img"
                                                     src="{{ asset('assets/imgs/products')}}/{{ $oneLimitedProduct->image }}"
                                                     alt="" height="280" width="280">
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="limit">limited</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product.category', $oneLimitedProduct->category->slug) }}">{{ $oneLimitedProduct->category->name }}</a>
                                        </div>
                                        <div class="product-price">
                                            <span><a href="{{ route('label', $oneLimitedProduct->label->slug) }}">{{ $oneLimitedProduct->label->name }}</a></span>
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', $oneLimitedProduct->slug) }}">{{ $oneLimitedProduct->name }}</a>
                                        </h2>
                                        <div>
                                            @if($oneLimitedProduct->sale !==0)
                                                <span>
                                                    <span>Скидка {{ $oneLimitedProduct->sale }}%</span>
                                                </span>
                                            @else
                                                <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="product-price">
                                            @if($oneLimitedProduct->sale !==0)
                                                <span>
                                                    ${{ $oneLimitedProduct->sale_price }}
                                                    </span>
                                                <span class="old-price">
                                                    ${{ $oneLimitedProduct->regular_price }}
                                                    </span>
                                            @else
                                                <span>${{ $oneLimitedProduct->regular_price }} </span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                               wire:click.prevent="store({{$oneLimitedProduct->id}}, '{{ $oneLimitedProduct->name }}', {{ $oneLimitedProduct->regular_price }})"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <div>
                                                <span>
                                                    До конца акции осталось
                                                </span>
                                        </div>
                                        <div class="CountDown">
                                            <div class="CountDown-block">
                                                <div class="CountDown-wrap">
                                                    <div class="CountDown-hours"><input type="text" readonly
                                                                                        wire:model="hours"></div>
                                                    <span class="CountDown-label">часов</span>
                                                </div>
                                            </div>
                                            <div class="CountDown-block">
                                                <div class="CountDown-wrap">
                                                    <div class="CountDown-minutes"><input type="text" readonly
                                                                                          wire:model="minutes"></div>
                                                    <span class="CountDown-label">минут</span>
                                                </div>
                                            </div>
                                            <div class="CountDown-block">
                                                <div class="CountDown-wrap">
                                                    <div class="CountDown-secs"><input type="text" readonly
                                                                                       wire:model="seconds"></div>
                                                    <span class="CountDown-label">секунд</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{ asset('assets/imgs/banner/banner-4.png') }}" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Лучшие предложения</h4>
                        <h1 class="fw-600 mb-20">Мировые бренды <br>у официальных поставщиков</h1>
                        <a href="{{ route('shop') }}" class="btn">Узнать предложения<i
                                class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Популярные</span> Категории</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                         id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach($popularCategories as $pcategory)
                            <div class="card-1">
                                <figure class=" img-hover-scale overflow-hidden">
                                    <a href="{{ route('product.category', $pcategory->slug) }}"><img
                                            src="{{ asset('assets/imgs/categories') }}/{{ $pcategory->image }}"
                                            alt="{{ $pcategory->name }}" height="150"></a>
                                </figure>
                                <h5>
                                    <a href="{{ route('product.category', $pcategory->slug) }}">{{ $pcategory->name }}</a>
                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{ asset('assets/imgs/banner/banner-1.png') }}" alt="">
                            <div class="banner-text">
                                <span>Летняя распродажа</span>
                                <h4>Сохраните 20% <br>на сумочках</h4>
                                <a href="{{ route('shop') }}">Узнать больше<i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{ asset('assets/imgs/banner/banner-2.png') }}" alt="">
                            <div class="banner-text">
                                <span>Горячие предложения</span>
                                <h4>Большая летняя <br>коллекция</h4>
                                <a href="{{ route('shop') }}">Узнать больше<i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="{{ asset('assets/imgs/banner/banner-3.png') }}" alt="">
                            <div class="banner-text">
                                <span>Новые поступления</span>
                                <h4>Покупай сегодня<br>самое свежее</h4>
                                <a href="{{ route('shop') }}">Узнать больше<i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Партнеры </span> сайта</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                         id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-1.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-2.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-3.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-4.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-5.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-6.png') }}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ asset('assets/imgs/banner/brand-3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(count($viewProducts) > 0 )
            <section class="section-padding">
                <div class="container wow fadeIn animated">
                    <h3 class="section-title mb-20"><span>Вы </span> смотрели</h3>
                    <div class="carausel-6-columns-cover position-relative">
                        <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                             id="carausel-6-columns-2-arrows"></div>
                        <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                            @foreach($viewProducts as $vproduct)
                                @if(!is_null($vproduct))
                                <div class="product-cart-wrap small hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug'=>$vproduct->slug]) }}">
                                                <img class="default-img"
                                                     src="{{ asset('assets/imgs/products')}}/{{ $vproduct->image }}"
                                                     alt="" height="194" width="194">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product.category', $vproduct->category->slug) }}">{{ $vproduct->category->name }}</a>
                                        </div>
                                        <div class="product-price">
                                            <span><a href="{{ route('label', $vproduct->label->slug) }}">{{ $vproduct->label->name }}</a></span>
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', $vproduct->slug) }}">{{ $vproduct->name }}</a>
                                        </h2>

                                        <div>
                                            @if($vproduct->sale !==0)
                                                <span>
                                            <span>Скидка {{ $vproduct->sale }}%</span>
                                        </span>
                                            @else
                                                <span>
                                            <span>Выгодная цена</span>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="product-price">
                                            @if($vproduct->sale !==0)
                                                <span>
                                            ${{ $vproduct->sale_price }}
                                        </span>
                                                <span class="old-price">
                                            ${{ $vproduct->regular_price }}
                                        </span>
                                            @else
                                                <span>${{ $vproduct->regular_price }} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!--End product-cart-wrap-2-->
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>
</div>
