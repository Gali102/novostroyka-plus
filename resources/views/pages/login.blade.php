@extends('layout')

@section('content')
<div class="page-content">
    <div class="breadcrumbs-container">
        <div class="container">
            <ul class="breadcrumbs min-list inline-list">
                <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__link">
                        <span class="breadcrumbs__title">Главная</span>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__page c-gray">Авторизация</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-login js-login-form">
                    <div class="form-login__block js-form-block is-selected" id="signin">
                        <form role="form" method="post" action="/login">
                            {{csrf_field()}}
                            <div class="form-container">
                                <h3 class="form-title t-center">Авторизация</h3>
                                
                                @include('admin.errors')
                                
                                <div class="form-group">
                                    <label for="login-user">Email</label>
                                    <input 
                                        type="text" 
                                        name="email" 
                                        id="email" 
                                        class="form-input form-input--pill form-input--border-c-gallery" 
                                        required 
                                        placeholder="Email"
                                        value="{{old('email')}}"
                                    >
                                </div><!-- .form-group -->

                                <div class="form-group">
                                    <label for="login-password">Пароль</label>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        class="form-input form-input--pill form-input--border-c-gallery" 
                                        required 
                                        placeholder="Пароль"
                                    >
                            <input type="hidden" name="last_ip" value="{{\Request::ip()}}">
                                </div><!-- .form-group -->

                                <div class="form-group">
                                    <div class="form-group__container">
                                      <label for="remember-me" class="icheck_label">

                                        <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Запомнить меня
                                    </label>
                                    @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="c-gray">Забыли пароль?</a>
                                @endif
                                </div><!-- .form-group__container -->
                            </div><!-- .form-group -->

                            <div class="form-group--submit">
                                <button class="button button--green button--pill button--large button--block button--submit" type="submit">
                                    Вход
                                </button>
                            </div>

                            <div class="form-group--footer">
                                <span class="c-gray">
                                    У вас нет аккаунта? <a href="/register" class="c-green t-underline">Регистрация</a>
                                </span>
                            </div>
                        </div><!-- .form-container -->
                        </form><!-- .signin -->
                    </div><!-- .form-login__block -->
                </div><!-- .form-login -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-content -->
@endsection