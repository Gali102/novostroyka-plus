@extends('layout')

@section('content')

<div class="page-content">
    <div class="breadcrumbs-container">
        <div class="container">
            <ul class="breadcrumbs min-list inline-list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">
                        <span class="breadcrumbs__title">Home</span>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__page c-gray">Контакты</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>
    
    <section class="contact-container">
        <div class="container">
            <h2 class="page-section__title">Связаться с нами.</h2>
            <p class="c-dove-gray">Мы работаем с понедельника по пятницу, 07:30-19:00 рабочее время.</p>

            <div class="contact-list">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="contact t-center">
                            <div class="contact-icon bg-primary">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <h3 class="contact-type">Адрес</h3>
                            <p class="c-dove-gray">г.Стерлитамак, ул.Суханова</p>
                        </div><!-- .contact -->
                    </div><!-- .col -->

                    <div class="col-md-6 col-lg-3">
                        <div class="contact t-center">
                            <div class="contact-icon bg-primary">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <h3 class="contact-type">Телефон</h3>
                            <a href="tel:+841234567890" class="c-dove-gray">+7(987) 053 6797</a>
                            <a href="tel:+849876543210" class="c-dove-gray">+7(987) 053 6797</a>
                        </div><!-- .contact -->
                    </div><!-- .col -->

                    <div class="col-md-6 col-lg-3">
                        <div class="contact t-center">
                            <div class="contact-icon bg-primary">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h3 class="contact-type">Почта</h3>
                            <a href="mailto:listiry@listiry.com" class="c-dove-gray">vakhitov797@gmail.com</a>
                            <a href="mailto:support@listiry.com" class="c-dove-gray">vakhitov797@gmail.com</a>
                        </div><!-- .contact -->
                    </div><!-- .col -->

                    <div class="col-md-6 col-lg-3">
                        <div class="contact t-center">
                            <div class="contact-icon bg-primary">
                                <i class="fa fa-share-alt"></i>
                            </div>
                            <h3 class="contact-type">Соц.сети</h3>
                            <ul class="min-list inline-list social-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .contact -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .contact-list -->

            <div class="row">
                <div class="col-md-6">
                    <h2 class="page-section__title">Мы находимся</h2>
                    <div class="contact-map-container">
                        <div id="contact-map" class="map"></div>
                    </div><!-- .contact-map-container -->
                </div><!-- .col -->

                <div class="col-md-6">
                    <h2 class="page-section__title">Обратная связь</h2>
                    
                    @include('pages.form')

                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .contact -->
</div><!-- .page-content -->

@endsection