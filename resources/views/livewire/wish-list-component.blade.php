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
        .product-cart-wrap .product-action-1 button:after, .product-cart-wrap .product-action-1 a.action-btn {
            left: -52%;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Главная</a>
                    <span></span> Избранное
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @foreach(Cart::instance('wishlist')->content() as $item)
                        <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">
                                            <img class="default-img"
                                                 src="{{ asset('assets/imgs/products')}}/{{ $item->model->image }}"
                                                 alt="{{ $item->model->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('product.category', ['slug'=>$item->model->category->slug]) }}">{{ $item->model->category->name }}</a>
                                    </div>
                                    <h2><a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a></h2>
                                    <div>
                                        @if($item->model->sale !==0)
                                            <span>
                                                <span>Скидка {{ $item->model->sale }}%</span>
                                            </span>
                                        @else
                                            <span>
                                                <span>Выгодная цена</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="product-price">
                                        @if($item->model->sale !==0)
                                            <span>
                                                ${{ $item->model->sale_price }}
                                            </span>
                                            <span class="old-price">
                                                ${{ $item->model->regular_price }}
                                            </span>
                                        @else
                                            <span>
                                                ${{ $item->model->regular_price }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="product-action-1 show">
                                            <a aria-label="Убрать из избранного" class="action-btn hover-up wishlisted"
                                               href="#" wire:click.prevent="removeFromWishList({{ $item->model->id }})"><i class="fi-rs-heart"></i></a>
{{--                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="#"--}}
{{--                                           wire:click.prevent="store({{ $item->model->id }}, '{{ $item->model->name }}', {{ $item->model->regular_price }})"><i--}}
{{--                                                class="fi-rs-shopping-bag-add"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
</div>
