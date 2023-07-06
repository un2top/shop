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
                                                 alt="{{ $item->model->name }}" width="280" height="280">
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
                                            <a aria-label="Убрать" class="action-btn hover-up wishlisted"
                                               href="#" wire:click.prevent="removeFromWishList({{ $item->model->id }})"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <hr>
                                    <div>
                                            <tr>
                                                <td>Назначение</td>
                                                <td>
                                                    <p>{{ $item->model->appointment }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Состав</td>
                                                <td>
                                                    <p>{{ $item->model->composition }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Особенности модели</td>
                                                <td>
                                                    <p>{{ $item->model->features }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Уход за вещами</td>
                                                <td>
                                                    <p>{{ $item->model->taking_care }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Тип посадки</td>
                                                <td>
                                                    <p>{{ $item->model->landing }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Рисунок</td>
                                                <td>
                                                    <p>{{ $item->model->drawing }}</p>
                                                </td>
                                            </tr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
</div>
