<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Главная</a>
                    <span></span> Регистрация
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Создать аккаунт</h3>
                                        </div>
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <form method="post" action="{{  route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="name" placeholder="Имя" value="{{ old('name') }}" required autofocus autocomplete="name">
                                            </div>
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email" value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Пароль" required  autocomplete="new-password">
                                            </div>
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <input required="" type="password" name="password_confirmation" placeholder="Подтвердить пароль" required  autocomplete="new-password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                            <label class="form-check-label" for="exampleCheckbox12"><span>Согласен(а) с условиями</span></label>
                                                    </div>
                                                </div>
                                                <a href="{{ route('policy') }}"><i class="fi-rs-book-alt mr-5 text-muted"></i>Условия</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Регистрация</button>
                                            </div>
                                        </form>
                                        <div class="text-muted text-center">Есть аккаунт? <a href="{{ route('login') }}">Войти</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
