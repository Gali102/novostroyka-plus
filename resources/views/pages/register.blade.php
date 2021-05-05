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
                    <span class="breadcrumbs__page c-gray">Регистрация</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-login js-login-form">
                    <form role="form" method="post" action="/register">
                    {{csrf_field()}}
                        <div class="form-container">
                            <h3 class="form-title t-center">Регистрация</h3>
                            @include('admin.errors')
                            <div class="form-group">
                            {{-- <input type="hidden" name="last_ip" value="{{\Request::ip()}}"> --}}
                                <label for="signup-email">Email *</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-input form-input--pill form-input--border-c-gallery" 
                                    required
                                    placeholder="Ваша почта"
                                    value="{{old('email')}}"
                                >
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label for="signup-name">Имя *</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-input form-input--pill form-input--border-c-gallery" 
                                    required
                                    placeholder="Ваше имя"
                                    value="{{old('name')}}"
                                >
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label for="signup-password">Пароль *</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-input form-input--pill form-input--border-c-gallery"
                                    required
                                    placeholder="******"
                                >
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <span class="c-gray">
                                    Создавая аккаунт, вы соглашаетесь с нашой <a data-toggle="modal" data-target="#largeModal" class="t-underline" style="cursor: pointer;">политикой конфиденциальности</a>
                                </span>
                            </div><!-- .form-group -->

                            <div class="form-group--submit">
                                <button class="button button--green button--pill button--large button--block button--submit" type="submit">
                                    Регистрация
                                </button>
                            </div>

                            <div class="form-group--footer">
                                <span class="c-gray">
                                    Уже есть аккаунт?
                                    <a href="/login" class="c-green t-underline">Авторизация</a>
                                </span>
                            </div>
                        </div><!-- .form-container -->
                    </form><!-- .signup -->
                </div><!-- .form-login__block -->
                
            </div><!-- .form-login -->
        </div><!-- .col -->
    </div><!-- .container -->
</div><!-- .page-content -->
@endsection

