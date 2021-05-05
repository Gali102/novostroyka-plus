@extends('layout')
@section('meta')
<meta name="csrf" value="{{ csrf_token() }}">
@endsection
@section('title')
        Сброс пароля
@endsection
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
                    <span class="breadcrumbs__page c-kvartitray">Восстановление пароля</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-login js-login-form">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                        <input type="hidden"  name="token" value="{{ $token ?? '' }}">
                        
                        <div class="form-container">
                            <div class="form-group">
                                <label for="reset-password">Ваш Email</label>
                                <input type="email" name="email" id="reset-password" class="form-input form-input--pill form-input--border-c-gallery" placeholder="johndoe@gmail.com" required>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="password">{{ __('Пароль') }}</label>
    
                                    <input id="password" type="password" class=" @error('password') is-invalid @enderror form-input form-input--pill form-input--border-c-gallery" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Повторите пароль') }}</label>
                                    <input id="password-confirm" type="password" class="form-input form-input--pill form-input--border-c-gallery" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group--submit">
                                <button class="button button--green button--pill button--large button--block button--submit" type="submit">
                                    Сброс пароля
                                </button>
                            </div>

                            <div class="form-group--footer">
                                <a href="#signin" class="c-green t-underline js-block-trigger">Вернуться к входу</a>
                            </div>
                        </div><!-- .form-container -->
                    </form><!-- .reset -->
                </div><!-- .form-login__block -->
            </div><!-- .form-login -->
        </div><!-- .col -->
    </div><!-- .container -->
</div><!-- .page-content -->
@endsection