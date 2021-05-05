@extends('layout')
@section('title')
    Подтверждение почты
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
                    <span class="breadcrumbs__page c-kvartitray">Верификация почты</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-header"><h5>{{ __('Внимание') }}</h5>
                    Для продолжения работы с сайтом вам нужно подтвердить ваш e-mail адрес.
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Письмо было отправлено вам на e-mail адрес') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                    <button class="verify__btn" type="submit">
                        @if (session('resent'))
                        {{ __('Нажмите для повторной отправки письма с дальнейшими интсрукциями') }}
                        @else
                        {{ __('Нажмите для получения письма с дальнейшими интсрукциями') }}
                        @endif
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('style')
<style>
        .verify__btn{
            text-decoration: underline;
            transition: all .4s ease-in-out;
        }
        .verify__btn:hover{
            text-decoration: none;
            color: rgb(37, 37, 255) !important;
        }
    </style>
@endpush
@endsection
