@extends('layout')

@section('content')
<!--main content start-->

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
                    <span class="breadcrumbs__page c-gray">Технические работы</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    <section class="error-404 t-center">
        <div class="container">
            <p class="error-404__subtitle">Данный раздел находится в разработке</p>
            <a class="error-404__button button button--square button--medium button--green" href="/">Перейти на главную</a>
        </div>
    </section>
</div>

<!-- end main content-->
@endsection