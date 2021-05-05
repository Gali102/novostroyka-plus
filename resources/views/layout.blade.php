<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <title>Новостройка Плюс | @yield('title')</title>
    <link rel="stylesheet" href="resources/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/front.css?v=1">
    <link rel="stylesheet" href="resources/assets/front/css/style.css">
    @stack('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh?v=2" crossorigin="anonymous">
</head>

<body>
    <header id="masthead" class="site-header site-header--fluid bg-primary">
        <div class="row justify-content-lg-between align-items-lg-center site-header__container">
            <div class="col-md-2 align-items-lg-center">
                <div class="">
                    <a href="/">
                        <h1 class="screen-reader-text"></h1>
                        <img src="/images/logo-1.png" alt="Новостройка Плюс">
                    </a>
                </div><!-- .site-header__logo -->
            </div>

            <div class="row col-md-10 align-items-lg-center">
                <ul class="min-list main-navigation main-navigation--white ml-auto">
                    <li>
                        <a href="/kvartiri">Квартиры</a>
                    </li>
                    <li>
                        <a href="/builder">Застройщики</a>
                    </li>
                    <li>
                        <a href="/blog">Блог</a>
                    </li>
                    <li>
                        <a href="/about">О нас</a>
                    </li>
                </ul>

                <div class="user-action ml-auto">
                    @if(Auth::check())
                        <a href="/profile" class="sign-in c-white">
                            <i class="fa fa-user"></i>
                            Профиль
                        </a>
                        <a href="/logout" class="sign-in c-white">
                            Выход
                        </a>
                    @else
                        <a href="/login" class="sign-in c-white">
                            <i class="fa fa-user"></i>
                            Вход
                        </a>
                    @endif
            
                    {{-- <button data-toggle="modal" data-target="#largeModalForm" class="button button--small button--pill button--primary d-none d-lg-inline-block">Оставить заявку</button> --}}
                </div><!-- .user-action -->
            </div>
            <div class="d-lg-none nav-mobile">
                <a href="#" class="nav-toggle js-nav-toggle nav-toggle--white">
                    <span></span>
                </a><!-- .nav-toggle -->
            </div><!-- .nav-mobile -->
        </div><!-- .site-header__container -->
    </header><!-- #masthead -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-dark m-3" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>
        </div>
    </div>

    @yield('content')

    <footer id="colophone" class="site-footer">
        <div class="t-center site-footer__primary">
            <div class="col-md-12 row">
                <div class="col-md-4 site-footer__logo">
                    <a href="/">
                        <h1 class="screen-reader-text">Новостройка Плюс</h1>
                        <img src="/images/logo-1.png" alt="Listiry">
                    </a>
                
                    <p class="t-small">Мы делаем поиск квартиры безопаснее и качественно.</p>
                    <p class="c-white"><a class="c-white" href="">8(987)-053-6797</a></p>
                    <p class="c-white"><a class="c-white" href="">vakhitov797@gmail.com</a></p>
                
                    <ul class="min-list inline-list site-footer__links site-footer__social">
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                
            </div>
                <div class="col-md-8 row" style="display: flex;justify-content:space-between">
                    <div class="footer_card col-md-4">
                        <h5>Закон о купле продаже недвижимости по всей россии</h5>
                        <p class="cart-text"><a href="#">Как? Где? Сколько стоит?</a></p>
                    </div>
                    <div class="footer_card col-md-4">
                        <h5>Юридическая помошь в оформлении документов</h5>
                        <p class="cart-text"><a href="#">Профессионалы всегда на связи!</a></p>
                    </div>
                    <div class="footer_card col-md-4">
                        <h5>Можно ли держать животных в съемных квартирах?</h5>
                        <p class="cart-text"><a href="#">Мы, Ваша уверенность в завтрашнем дне</a></p>
                    </div>
                    <div class="footer_card col-md-4">
                        <h5>Ремонт вашей мечты, в два клика</h5>
                        <p class="cart-text"><a href="#">Мы лучше любой фантазии</a></p>
                    </div>
                    <div class="footer_card col-md-4">
                        <h5>Как не быть обманутым</h5>
                        <p class="cart-text"><a href="#">Курсы юридической граммотности</a></p>
                    </div>
                     <div class="footer_card col-md-4 light">
                        <h5 style="color: #fcd100">Место для вашей рекламы</h5>
                        <p class="cart-text"><a href="#">Все вопросы по рекламе</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- .site-footer__primary -->

        <div class="site-footer__secondary">
            <div class="container">
                <div class="site-footer__secondary-wrapper">
                    <p class="site-footer__copyright">&copy; 2021
                    <span class="c-green">novostroyka-plus.ru</span> Все права защищены.</p>
                    <ul class="min-list inline-list site-footer__links site-footer__details">
                        <li>
                            <a href="tel:+0987654321">Tel: +7987 053 6797</a>
                        </li>
                        <li>
                            <a href="/kvartiri">Квартиры</a>
                        </li>
                        <li>
                            <a href="/builder">Застройщики</a>
                        </li>
                        <li>
                            <a href="/blog">Блог</a>
                        </li>
                        <li>
                            <a href="/about">О нас</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="js/app.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
    <script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
    <script src="/js/front.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    @stack('script')
    @include('pages.modal')
</body>
</html>
