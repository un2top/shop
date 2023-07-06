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
                    <span></span> Заказ №{{ $order->id  }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">Заказы</div>
                                    <div class="col-md-6"><a href="{{ route('admin.dashboard') }}" class="btn btn-success float-end">Заказы</a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$order->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Сумма</td>
                                            <td>${{$order->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td>Товары</td>
                                            <td>@foreach($order->orderItems as $item)
                                                    <p><a href="{{ route('product.details', $item->product->slug) }}">{{ $item->product->name }} </a> </p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Имя</td>
                                            <td>{{$order->firstName}}</td>
                                        </tr>
                                        <tr>
                                            <td>Фамилия</td>
                                            <td>{{$order->lastName}}</td>
                                        </tr>
                                        <tr>
                                            <td>Улица, дом</td>
                                            <td>{{$order->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td>{{$order->town}}</td>
                                        </tr>
                                        <tr>
                                            <td>Почтовый индекс</td>
                                            <td>{{$order->postIndex}}</td>
                                        </tr>
                                        <tr>
                                            <td>email</td>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Телефон</td>
                                            <td>{{$order->telephone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Вид оплаты</td>
                                            <td>{{$order->paymentmode}}</td>
                                        </tr>
                                        <tr>
                                            <td>Статус заказа</td>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

