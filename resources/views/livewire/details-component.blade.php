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
                    <span></span> {{ $product->category->name }}
                    <span></span> {{ $product->name }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs/products')}}/{{ $product->image }}"
                                                     alt="product image">
                                            </figure>
                                        </div>
                                        <!-- THUMBNAILS -->
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    @php
                                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                                    @endphp
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Категория: <a href="{{ route('product.category', ['slug'=>$product->category->slug]) }}">{{ $product->category->name }}</a></span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if($product->sale !=0)
                                                <ins><span class="text-brand">${{ $product->sale_price }}</span></ins>
                                                 <ins><span class="old-price font-md ml-15">${{ $product->regular_price }}</span></ins>
                                                 <span class="save-price  font-md color3 ml-15">{{ $product->sale }}% скидка</span>
                                                @else
                                                 <ins><span class="text-brand">${{ $product->regular_price }}</span></ins>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->sort_description }}</p>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="product-extra-link2">
                                                <div class="product-action-1 show">
                                                    @if($witems->contains($product->id))
                                                        <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted"
                                                           href="#" wire:click.prevent="removeFromWishList({{ $product->id }})"><i class="fi-rs-heart"></i></a>
                                                    @else
                                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWitchList({{ $product->id }}, '{{$product->name}}', {{ $product->sale_price }})">
                                                            <i class="fi-rs-heart"></i></a>
                                                    @endif
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                       wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})"><i
                                                            class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: {{ $product->SKU }}</li>
                                            <li>В наличии:<span
                                                    class="in-stock text-success ml-5"> {{ $product->quantity }} шт.</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link" id="Description-tab" data-bs-toggle="tab"
                                           href="#Description">Описание</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                           href="#Additional-info">Дополнительная информация</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Отзывы</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {{ $product->description }}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                            <tr>
                                                <td>Назначение</td>
                                                <td>
                                                    <p>{{ $product->appointment }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Состав</td>
                                                <td>
                                                    <p>{{ $product->composition }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Особенности модели</td>
                                                <td>
                                                    <p>{{ $product->features }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Уход за вещами</td>
                                                <td>
                                                    <p>{{ $product->taking_care }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Тип посадки</td>
                                                <td>
                                                    <p>{{ $product->landing }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Рисунок</td>
                                                <td>
                                                    <p>{{ $product->drawing }}</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade show" id="Reviews">
                                        <!--Comments-->
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Коментарии ({{$comments->count()}})</h4>
                                                    <div class="comment-list">
                                                        @foreach($comments as $comment)
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{ asset('assets/imgs/page/avatar-6.jpg') }}" alt="">
                                                                    <h6>{{ $comment->user->name }}</h6>
                                                                    <p class="font-xxs"></p>
                                                                </div>
                                                                <div class="desc">
                                                                    <p>{{ $comment->content }}</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">{{ $comment->dateAsCarbon->diffForHumans() }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        @if(auth()->user())
                                        <div class="comment-form">
                                            <h4 class="mb-15">Добавить коментарий</h4>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" wire:submit.prevent="storeComment({{ auth()->user()->id }} )">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3 mt-3">
                                                                    <textarea class="form-control" name="comment" placeholder="Описание" wire:model.defer="comment"></textarea>
                                                                    @error('comment')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">
                                                                Отправить
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <span>Для оставления комментария необходимо </span><a href="#">авторизироваться</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Похожие товары</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($relatedProducts as $rproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', ['slug'=>$rproduct->slug]) }}"
                                                               tabindex="0">
                                                                <img class="default-img"
                                                                     src="{{ asset('assets/imgs/products') }}/{{ $rproduct->image }}"
                                                                     alt="{{ $rproduct->name }}">
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2>
                                                            <a href="{{ route('product.details', ['slug'=>$rproduct->slug]) }}"
                                                               tabindex="0">{{ $rproduct->name }}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>${{ $rproduct->regular_price }} </span>
                                                            {{--                                                        <span class="old-price">$245.8</span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
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
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
