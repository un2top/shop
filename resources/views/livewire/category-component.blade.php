<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
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
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p><strong class="text-brand">{{ $category_name }}: </strong> <strong class="text-brand">{{ $products->total() }} товаров</strong></p>
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
                                            <li><a class="{{ $pageSize == 12 ? 'active': '' }}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{ $pageSize == 15 ? 'active': '' }}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{ $pageSize == 25 ? 'active': '' }}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{ $pageSize == 32 ? 'active': '' }}" href="#" wire:click.prevent="changePageSize(32)">32</a></li>
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
                                            <li><a class="{{ $orderBy == 'По умолчанию' ? 'active': '' }}" href="#" wire:click.prevent="changeOrderBy('По умолчанию')">По умолчанию</a></li>
                                            <li><a class="{{ $orderBy == 'Сначала недорогие' ? 'active': '' }}" href="#" wire:click.prevent="changeOrderBy('Сначала недорогие')">Сначала недорогие</a></li>
                                            <li><a class="{{ $orderBy == 'Сначала дорогие' ? 'active': '' }}" href="#" wire:click.prevent="changeOrderBy('Сначала дорогие')">Сначала дорогие</a></li>
                                            <li><a class="{{ $orderBy == 'Сначала новые' ? 'active': '' }}" href="#" wire:click.prevent="changeOrderBy('Сначала новые')">Сначала новые</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug'=>$product->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/imgs/products')}}/{{ $product->image }}"
                                                         alt="{{ $product->name }}" width="280" height="280">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ $product->category->slug }}">{{ $product->category->name }}</a>
                                            </div>
                                            <h2><a href="{{ route('product.details', ['slug'=>$product->slug]) }}">{{ $product->name }}</a></h2>
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
                                                    ${{ $product->sale_price }}
                                                </span>
                                                    <span class="old-price">
                                                    ${{ $product->regular_price }}
                                                </span>
                                                @else
                                                    <span>${{ $product->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                   wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})"><i
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
                                    <li><a href="{{ route('product.category', ['slug'=>$category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

