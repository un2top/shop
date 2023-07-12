<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }

        .wishlisted {
            background-color: #F15412 !important;
            border: 1px solid transparent !important;
        }

        .wishlisted i{
            color: #fff !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Главная</a>
                    <span></span> Товары
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> Найдено <strong class="text-brand">{{ $products->total() }}</strong> товаров
                                </p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $pageSize }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $pageSize == 12 ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{ $pageSize == 15 ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{ $pageSize == 25 ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{ $pageSize == 32 ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changePageSize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Сортировка:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $orderBy }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'Сначала по отзывам' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала по отзывам')">Сначала по отзывам</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Сначала недорогие' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала недорогие')">Сначала недорогие</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Сначала дорогие' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала дорогие')">Сначала дорогие</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Сначала новые' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала новые')">Сначала новые</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Сначала популярные' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала популярные')">Сначала популярные</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Сначала по отзывам' ? 'active': '' }}" href="#"
                                                   wire:click.prevent="changeOrderBy('Сначала популярные')">Сначала по отзывам</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', $product->slug) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $product->image }}"
                                                         alt="{{ $product->name }}" width="280" height="280">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ route('product.details', $product->slug)  }}">{{ Str::limit(($product->sort_description), 30) }}</a>
                                            </div>
{{--                                            <div class="product-price">--}}
{{--                                                <span><a href="{{ route('label', $product->labels->slug) }}">{{ $product->labels->name }}</a></span>--}}
{{--                                            </div>--}}
                                            <h2><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h2>
                                            <div>
                                                @if($product->sale !==0)
                                                    <span>
                                                    <span>Скидка {{ $product->sale }}%</span>
                                                </span>
                                                @else
                                                    <span>
                                                    <span>Выгодная цена</span>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if($product->sale !==0)
                                                    <span>
                                                    ${{ $product->sred_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $product->sred_price }}
                                                </span>
                                                @else
                                                    <span>${{ $product->sred_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                @if($witems->contains($product->id))
                                                    <a aria-label="Удалить из избраного" class="action-btn hover-up wishlisted"
                                                       href="#" wire:click.prevent="removeFromWishList({{ $product->id }})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Добавить в избранное" class="action-btn hover-up" href="#" wire:click.prevent="addToWitchList({{ $product->id }}, '{{$product->name}}', {{ $product->sred_price }})">
                                                        <i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="В корзину" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sred_price }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                            <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                {{ $products->links() }}
                            </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Категории</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('product.category', ['slug'=>$category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Цена</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Цена:</span> <span class="text-info">${{ $min_value }}</span> - <span
                                                class="text-info">${{ $max_value }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Новинки</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($latestProducts as $lproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/products')}}/{{ $lproduct->image }}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{ route('product.details', $lproduct->slug) }}">{{ $lproduct->name }}</a></h5>
                                    <p class="price mb-0 mt-5">${{ $lproduct->regular_price }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{ asset('assets/imgs/banner/banner-11.jpg') }}" alt="">
                            <div class="banner-text">
                                <h4>Лучшие товары<br>для девушек</h4>
                                <a href="{{ route('shop') }}">Узнать<i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function () {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function (event, ui) {
                @this.set('min_value', ui.values[0])
                @this.set('max_value', ui.values[1])
                }
            });
        });
    </script>
@endpush
