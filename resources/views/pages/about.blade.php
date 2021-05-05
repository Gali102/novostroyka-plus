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
                    <span class="breadcrumbs__page c-gray">О нас</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>

    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <header class="entry-header">
                <h1 class="entry-title">Заголовок о нас.</h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p>
                  When friends and family far removed from the travel hacking/cheap flights space ask me about a website, I know
                  its mainstream. While there are many good deal websites out there (The Flight Deal, Secret Flying, and Holiday
                  Pirates are three of my favorites), Scott’s Cheap Flights seems to have broken through where others have not.
                  Over 1 million people get his daily flight deals email. I’m a big fan of the website and their ability to
                  often break airfare deals (I used one of their alerts to fly to South Africa). It turns out Scott is a fan of
                  my website too so we sat down for an interview where I got him to spill the secret behind his website:
                </p>
                <p>
                  <strong>Nomadic Matt: Tell everyone about yourself. How did you get into this?</strong>
                  <br/>
                  <strong>Scott: </strong>
                  When I graduated college in 2009, I knew two things: (1) I wanted to travel the world and (2) I was never
                  going to be wealthy. So if I wasn’t going to let #2 prevent #1, I knew I would have to figure out some
                  creative ways to travel without spending my life savings. I began reading up on flight pricing economics,
                  spending hours on various flight search engines, and learning various airfare patterns. Before long, I found
                  an online community of fellow travel hackers and cheap-flight aficionados who enjoy not just travel but also
                  the thrill of getting a great deal on flights.
                </p>
                <p>
                  <strong>Where did the idea of this website come from?</strong>
                  Scott’s Cheap Flights has a weird origin story. In 2013, I got the best deal of my life: nonstop from NYC to
                  Milan for $130 round-trip. Milan hadn’t even been on my radar as a place to visit, but for $130 round-trip,
                  there’s no way I wouldn’t go. And it turned out to be amazing! I went skiing in the Alps, caught an AC Milan
                  match, hiked Cinque Terre, hung out on Lake Como. It was divine.
                </p>
                <p>
                  When I got back, word spread among friends and coworkers about the deal I got, and dozens of them began asking
                  me to let them know next time I found a fare like that so they could get in on it, too. So rather than try to
                  remember to tell George and Esther and Aviva when a great deal popped up, I decided to start a simple little
                  email list instead so I could alert everyone at once. Scott’s Cheap Flights was born.
                </p>
                <p>
                  <em>Scott founded Scott’s Cheap Flights in a Denver coffeeshop. Scott is the flight searcher-in-chief,
                    spending 8-12 hours a day on Google Flights as well as overseeing daily operations. If you’re looking for
                flight deals, it’s one of the best.</em>
                </p>
            </div><!-- .entry-content -->

            <div class="entry-meta">
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
                    <li>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div><!-- .entry-meta -->
      
            <div class="comments-wrap">
                <h3 class="comments-title">Обратная связь</h3>
                <form class="comment-form" action="/" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="author">Ваше имя *</label>
                                <input type="text" name="author" id="author" class="form-input form-input--square form-input--border-c-alto" placeholder="Введите ваше имя" required>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Ваш email *</label>
                                <input type="email" name="email" id="email" class="form-input form-input--square form-input--border-c-alto" placeholder="Введите ваш email" required>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">Ваше сообщение</label>
                                <textarea class="form-input form-input--square form-input--border-c-alto" rows="8" id="comment" name="comment" placeholder="Ваше сообщение"></textarea>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-12">
                            <div class="form-group--submit">
                                <button class="button button--square button--green button--large button--submit" type="submit">
                                Отправить сообщение
                                </button>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </form><!-- .comment-form -->
            </div><!-- .comments-wrap -->
        </div><!-- .col -->
    </div><!-- .container -->
</div>

@endsection