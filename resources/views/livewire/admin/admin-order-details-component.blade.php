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
                                @if(Session::has('order_message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                                @endif
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td colspan="2" wire:model="order_id"></td>
                                        </tr>
                                        <tr>
                                            <td>Сумма</td>
                                            <td colspan="2"><input type="text" name="subtotal"  class="form-control"  wire:model="subtotal"></td>
                                        </tr>
                                        <tr>
                                            <td>Товары</td>
                                            <td colspan="2">
                                                @foreach($order->orderItems as $item)
                                                    <p><a href="{{ route('product.details', $item->product->slug) }}">{{ $item->product->name }} </a>x {{ $item->quantity }}
                                                        <a href="#" wire:click.prevent="deleteOrderItem({{$item->id}}, {{ $item->quantity }})" class="text-danger">Удалить</a> </p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Имя</td>
                                            <td colspan="2"><input type="text" name="firstName" class="form-control"  wire:model="firstName"></td>
                                        </tr>
                                        <tr>
                                            <td>Фамилия</td>
                                            <td colspan="2"><input type="text" name="lastName" class="form-control" wire:model="lastName"></td>
                                        </tr>
                                        <tr>
                                            <td>Улица, дом</td>
                                            <td colspan="2"><input type="text" name="address" class="form-control"  wire:model="address"></td>
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td colspan="2"><input type="text" name="town" class="form-control"  wire:model="town"></td>
                                        </tr>
                                        <tr>
                                            <td>Почтовый индекс</td>
                                            <td colspan="2"><input type="text" name="postIndex" class="form-control"  wire:model="postIndex"></td>
                                        </tr>
                                        <tr>
                                            <td>email</td>
                                            <td colspan="2"><input type="text" name="email" class="form-control"  wire:model="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Телефон</td>
                                            <td colspan="2"><input type="text" name="telephone" class="form-control"  wire:model="telephone"></td>
                                        </tr>
                                        <tr>
                                            <td>Вид оплаты</td>
                                            <td><input type="text" name="paymentmode" class="form-control"  wire:model="paymentmode"></td>
                                            <td>
                                                <select class="form-control" wire:model="paymentmode">
                                                    <option value="">-- Выбрать оплату --</option>
                                                    <option value="cod">Наличными курьеру</option>
                                                    <option value="codcard">Картой курьеру</option>
                                                    <option value="card">Онлаин картой</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cтатус заказа</td>
                                            <td><input type="text" name="status" class="form-control"  wire:model="status"></td>
                                            <td>
                                                <select class="form-control" wire:model="status">
                                                    <option value="">-- Выбрать статус --</option>
                                                    <option value="ordered">Заказно</option>
                                                    <option value="delivered">Доставлено</option>
                                                    <option value="canceled">Отменено</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-6"><a href="#" wire:click.prevent="updateOrder({{ $order->id }})" class="btn btn-success float-end">Обновить</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

