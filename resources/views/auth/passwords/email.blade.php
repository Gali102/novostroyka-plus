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
                    <span class="breadcrumbs__page c-gray">Восстановление пароля</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="form-login js-login-form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-container">
                            <div class="form-group">
                            <label for="reset-password">Ваш Email</label>                            
                                <input id="reset-password" type="email" class="@error('email') is-invalid @enderror form-input form-input--pill form-input--border-c-gallery" placeholder="johndoe@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group--submit">
                                <button class="button button--green button--pill button--large button--block button--submit" type="submit">
                                    Сброс пароля
                                </button>
                            </div>
                            <div class="form-group--footer">
                                <a href="/login" class="c-green t-underline js-block-trigger">Вернуться к входу</a>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
