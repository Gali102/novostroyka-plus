@extends('layout')
@section('title')
    Профиль {{Auth::user()->name}}
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
                    <span class="breadcrumbs__page c-gray">Мой профиль</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="settings">
                    <h2 class="settings__header">Привет, <strong>{{$user->name}}!</strong></h2>
                    <div class="setting-group">
                        <h3 class="setting-group__title c-gray">Управление аккаунтом</h3>
                        <ul class="setting-container min-list">
                            <li class="setting setting--current">
                                <i class="fa fa-user setting__icon"></i>
                                <a href="/profile" class="setting__link">Мой профиль</a>
                            </li>
                        </ul><!-- .setting-container -->
                    </div><!-- setting-group -->

                    <div class="setting-group">
                        <ul class="setting-container min-list">
                            @if (Auth::user()->is_admin == true)
                                <li class="setting">
                                    <i class="fa fa-cogs setting__icon"></i>
                                    <a href="/admin" class="setting__link">Войти в админ панель</a>
                                </li>
                            @endif
                            <li class="setting">
                                <i class="fa fa-lock setting__icon"></i>
                                <a href="/changepassword" class="setting__link">Поменять пароль</a>
                            </li>
                            <li class="setting">
                                <i class="fa fa-power-off setting__icon"></i>
                                <a href="/logout" class="setting__link">Выйти</a>
                            </li>
                        </ul><!-- .setting-container -->
                    </div><!-- setting-group -->
                </div><!-- .settings -->
            </div><!-- .col -->

            <div class="col-lg-9">
                <form role="form" method="post" action="/profile" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="name">Ваше имя *</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-input form-input--square form-input--border-c-alto bg-wild-sand form-input--large" 
                                    required 
                                    value="{{$user->name}}"
                                >
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label for="email">Ваш E-mail *</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-input form-input--square form-input--border-c-alto bg-wild-sand form-input--large"
                                    required 
                                    value="{{$user->email}}"
                                >
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label for="phone">Ваш телефон</label>
                                <input type="tel" name="phone" id="phone" class="form-input form-input--square form-input--border-c-alto bg-wild-sand form-input--large">
                            </div><!-- .form-group -->
                        </div><!-- .col -->

                        <div class="col-lg-5">
                            <h5 class="t-center">Ваш аватар</h5>

                            <img src="{{$user->getImage()}}" alt="" class="profile-image m-1">

                            <div class="form-group">
                                <!-- <span class="form-label">Выберет</span> -->
                                <input type="file" class="form-control" id="image" name="avatar">
                                <!-- <div class="dropzone" id="listing-gallery"></div> -->
                            </div>
                        </div><!-- .col -->

                        <div class="col-lg-12">
                            <div class="form-group--submit">
                                <button class="button button--square button--green button--large button--submit" type="submit">
                                    Сохранить изменения
                                </button>
                            </div>
                        </div>
                    </div><!-- row -->
                </form>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-content -->

@endsection