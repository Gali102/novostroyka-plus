@extends('layout')

@section('content')

<div class="page-content">
    <div class="breadcrumbs-container">
        <div class="container">
            <ul class="breadcrumbs min-list inline-list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">
                        <span class="breadcrumbs__title">Главная</span>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__page c-gray">Замена пароля</span>
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
                            <li class="setting">
                                <i class="fa fa-user setting__icon"></i>
                                <a href="/profile" class="setting__link">Мой профиль</a>
                            </li>
                        </ul><!-- .setting-container -->
                    </div><!-- setting-group -->

                    <div class="setting-group">
                        <ul class="setting-container min-list">
                            <li class="setting setting--current">
                                <i class="fa fa-lock setting__icon"></i>
                                <a href="/changepassword" class="setting__link">Поменять пароля</a>
                            </li>
                            <li class="setting">
                                <i class="fa fa-power-off setting__icon"></i>
                                <a href="/logout" class="setting__link">Выйти</a>
                            </li>
                        </ul><!-- .setting-container -->
                    </div><!-- setting-group -->
                </div><!-- .settings -->
            </div><!-- .col -->

            <div class="col-lg-4 offset-lg-2">
                <form role="form" method="post" action="/changepassword" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-container">
                        <!-- <div class="form-group">
                            <label for="current-password">Введите старый пароль *</label>
                            <input type="password" name="current-password" id="current-password" class="form-input form-input--pill form-input--border-c-gallery" required>
                        </div> -->

                        <div class="form-group">
                            <label for="new-password">Введите новый пароль *</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-input form-input--pill form-input--border-c-gallery" 
                                required
                                placeholder="Введите новый пароль"
                            >
                        </div><!-- .form-group -->

                        <!-- <div class="form-group">
                            <label for="confirm-password">Повторите новый пароль *</label>
                            <input type="password" name="confirm-password" id="confirm-password" class="form-input form-input--pill form-input--border-c-gallery" required>
                        </div> -->

                        <div class="form-group--submit">
                            <button class="button button--primary button--pill button--large button--block button--submit" type="submit">
                                Поменять пароль
                            </button>
                        </div>
                    </div><!-- .form-container -->
                </form><!-- .form -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-content -->

@endsection