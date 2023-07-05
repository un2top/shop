<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Главная</a>
                    <span></span> Товары
                    <span></span> Оформление заказа
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Оформление заказа</h4>
                        </div>
                        <form wire:submit.prevent="placeOrder">
                            <div class="form-group">
                                <input type="text"  name="firstName" placeholder="Имя *" wire:model="firstName">
                                @error('firstName')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text"  name="lastName" placeholder="Фамилия *"
                                       wire:model="lastName">
                                @error('lastName')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text"  name="email" placeholder="email *"
                                       wire:model="email">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="address"
                                       placeholder="Улица / дом / квартира *" wire:model="address">
                                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input  type="text" name="town" placeholder="Город *" wire:model="town">
                                @error('town')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input  type="text" name="postIndex" placeholder="Почтовый индекс *"
                                       wire:model="postIndex">
                                @error('postIndex')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input  type="tel" name="telephone" placeholder="Телефон без + *"
                                       wire:model="telephone">
                                @error('telephone')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input"  type="radio" name="paymentmode"
                                               id="exampleRadios3" value="cod" wire:model="paymentmode">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                               data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Курьеру
                                            наличными</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="paymentmode"
                                               id="exampleRadios4" value="codcard" wire:model="paymentmode">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                               data-target="#cardPayment" aria-controls="cardPayment">Курьеру
                                            картой</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input"  type="radio" name="paymentmode"
                                               id="exampleRadios4" value="card" wire:model="paymentmode">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                               data-target="#cardPayment" aria-controls="cardPayment">Онлаин</label>
                                    </div>
                                    @error('paymentmode')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Оформить</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Ваш заказ</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="{{ asset('assets/imgs/products')}}/{{ $item->model->image }}" alt="#"></td>
                                        <td>
                                            <h5><a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a></h5>
                                            <span class="product-qty">x {{$item->qty}}</span>
                                        </td>
                                        <td>${{ $item->subtotal }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>Сумма</th>
                                        <td class="product-subtotal" colspan="2">${{ Session::get('checkout')['total'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Доставка</th>
                                        <td colspan="2"><em>Бесплатно</em></td>
                                    </tr>
                                    <tr>
                                        <th>Всего</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">${{ Session::get('checkout')['total'] }}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
