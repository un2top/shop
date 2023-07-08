<main class="main single-page">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Главная</a>
                <span></span> Продавец
            </div>
        </div>
    </div>
    <section class="section-padding">
        <div class="container pt-25">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                    <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Наша компания</h6>
                    <h1 class="font-heading mb-40">
                        {{ $label->name }}
                    </h1>
                    {{ $label->description }}
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/imgs/lables') }}/{{ $label->image }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="section-padding">
        <div class="container pt-25">
            <div class="row mb-50">
                <div class="col-lg-12 col-md-12">
                    <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">Наш
                        адрес: {{ $label->address }}</h6>
                    <h5 class="mb-15 text-grey-1 wow fadeIn animated">Email - {{ $label->email }}</h5>
                    <h5 class="mb-15 text-grey-1 wow fadeIn animated">Телефон - {{ $label->phone }}</h5>
                </div>
            </div>
            <section class="mt-50 mb-50">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
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
                                                <div class="product-price">
                                                    <span><a href="{{ route('label', $product->label->slug) }}">{{ $product->label->name }}</a></span>
                                                </div>
                                                <h2>
                                                    <a href="{{ route('product.details', ['slug'=>$product->slug]) }}">{{ $product->name }}</a>
                                                </h2>
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
                            <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
