@extends('layout')

@section('content')

<div class="page-content page-content--no-b-bottom">
  <div class="breadcrumbs-container">
    <div class="container">
      <ul class="breadcrumbs min-list inline-list">
        <li class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__link">
            <span class="breadcrumbs__title">Главная</span>
          </a>
        </li>

        <li class="breadcrumbs__item">
          <span class="breadcrumbs__page c-gray">{{$builder->title}}</span>
        </li>
      </ul><!-- .breadcrumbs -->
    </div><!-- .container -->
  </div>

  <section class="single-listing single-listing--layout-1">
  <header class="listing-header">
    <div class="container">
      <div class="listing-header__container">
        <div class="d-lg-flex justify-content-lg-between">
          <div class="listing-header__main">
            <div class="d-flex">
              <div class="listing-header__content">
                <div class="d-sm-flex align-items-sm-center">
                  <h2 class="listing-header__title">{{$builder->title}}</h2>
                  <div>
                    <i class="fa fa-check-circle c-green"></i>
                    <span class="c-dusty-gray">Проверенно</span>
                  </div>
                </div>

                <ul class="min-list listing-header__detail">
                  <li>
                    <span>г. {{$builder->getCitiTitle()}}</span>
                  </li>
                </ul><!-- .listing__header-detail -->
              </div><!-- .listing-header__content -->
            </div><!-- .listing__wrapper -->
          </div><!-- .listing-header__main -->
        </div>
      </div><!-- .listing-header__container -->
    </div><!-- .container -->
  </header><!-- .listing-header -->
  <nav class="listing-nav bg-white">
    <div class="container">
      <ul class="min-list inline-list listing-tabs">
        <li class="listing-tab is-active">
          <a href="#about" id="about-link" class="listing-nav-link">
            Описание
          </a>
        </li><!-- .listing-tab -->

        <li class="listing-tab">
          <a href="#gallery" id="gallery-link" class="listing-nav-link">
            Фото
          </a>
        </li><!-- .listing-tab -->

        <li class="listing-tab">
          <a href="#reviews" id="reviews-link" class="listing-nav-link">
            Отзывы
          </a>
        </li><!-- .listing-tab -->
      </ul><!-- .listing-tabs -->
    </div>
  </nav>
  <div class="listing-main bg-wild-sand">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <p>
              <img src="{{$builder->getImage()}}" alt="Single Listing">
            </p>
          </div>
          <div id="about" class="listing-section bg-white hover-effect" data-matching-link="#about-link">
            <div class="listing-section__header">
              <h3 class="listing-section__title">{!! $builder->description !!}</h3>
            </div><!-- .listing-section__header -->

            <div class="c-dove-gray">
              <p>
                {!! $builder->content !!}
              </p>
            </div>
            
          </div><!-- .listing-section -->

              @if(!$builder->review->isEmpty())
              <div id="reviews" class="listing-section bg-white hover-effect" data-matching-link="#reviews-link">
                <h3 class="comments-title">Количество отзывов: {{$builder->getReviews()->count()}}</h3>
              @foreach($builder->getReviews() as $review)
              <div class="comments-wrap">       
                <ol class="min-list comment-list">
                  <li class="comment">
                    <article>
                      <div class="comment-wrapper">
                        <div class="comment-avatar">
                          <img src="/images/uploads/james-turner.jpg" alt="James Turner">
                        </div><!-- .comment-avatar -->

                        <div class="comment-content">
                          <header class="comment-header">
                            <h4 class="comment-author">{{$review->author->name}}</h4>
                            <span class="comment-time c-gray">{{$review->created_at->diffForHumans()}}</span>
                          </header>

                          <div class="comment-body c-dove-gray">
                            <p>
                              {{$review->text}}
                            </p>
                          </div>
                        </div><!-- .comment-content -->
                      </div><!-- .comment-wrapper -->
                    </article>
                  </li><!-- .comment -->
                </ol><!-- .comment-list -->
              </div><!-- .comments-wrap -->
              @endforeach
              </div>
              @endif
          <!-- .listing-section -->
         
          @if(Auth::check())
          <div class="comments-wrap">
            <h3 class="comments-title">Оставить отзыв</h3>
            <form class="comment-form" role="form" action="/review" method="post">
              {{csrf_field()}}
              <div class="row">
                <input type="hidden" name="builder_id" value="{{$builder->id}}">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="comment">Ваш отзыв</label>
                    <textarea
                      class="form-input form-input--square form-input--border-c-alto"
                      rows="8"
                      id="review"
                      name="message"
                      placeholder="Ваш отзыв"
                    ></textarea>
                  </div>
                </div><!-- .col -->

                <div class="col-md-12">
                  <div class="form-group--submit">
                    <button
                      class="button button--square button--green button--large button--submit" type="submit">
                      Отправить отзыв
                    </button>
                  </div>
                </div><!-- .col -->
              </div><!-- .row -->
            </form><!-- .comment-form -->
          </div><!-- .comments-wrap -->
          @endif
        </div><!-- .col -->

        <div class="col-lg-4">
          <div class="listing-widget bg-white hover-effect"> 

            <ul class="min-list listing-contact-list">
              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-compass listing-contact__icon"></i>
                <span class="c-primary">г. {{$builder->getCitiTitle()}} , {{$builder->adress}}</span>
              </li>

              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-phone listing-contact__icon"></i>
                <a href="tel:+442077391628">{{$builder->phone}}</a>
              </li>

              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-globe listing-contact__icon"></i>
                <a href="#">{{$builder->site}}</a>
              </li>
            </ul><!-- .listing-contact-list -->

            <div class="listing-social">
              <span class="c-dove-gray">Соц.сети</span>
              <ul class="min-list inline-list social-list">
                <li>
                  <a href="{{$builder->fb}}">
                    <i class="fa fa-facebook-f c-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="{{$builder->vk}}">
                    <i class="fa fa-vk c-vk"></i>
                  </a>
                </li>
                <li>
                  <a href="{{$builder->tvit}}">
                    <i class="fa fa-twitter c-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="{{$builder->inst}}">
                    <i class="fa fa-instagram c-instagram"></i>
                  </a>
                </li>
              </ul><!-- .social-list -->
            </div><!-- .listing-social -->
          </div><!-- .listing-widget -->

          <div class="listing-widget bg-white hover-effect">
            <h3 class="listing-widget__title">Время работы</h3>
            <table class="listing-timetable">
              <tr>
                <th><strong>Mon</strong></th>
                <td>{{$builder->workpn}}</td>
                <td class="c-secondary"></td>
              </tr>
              <tr>
                <th><strong>Tue</strong></th>
                <td>{{$builder->workvt}}</td>
                <td class="c-secondary">
                </td>
              </tr>
              <tr>
                <th><strong>Wed</strong></th>
                <td>{{$builder->worksr}}</td>
                <td class="c-secondary">
                </td>
              </tr>
              <tr>
                <th><strong>Thur</strong></th>
                <td>{{$builder->workch}}</td>
                <td class="c-secondary">
                </td>
              </tr>
              <tr>
                <th><strong>Fri</strong></th>
                <td>{{$builder->workpt}}</td>
                <td class="c-secondary">
                </td>
              </tr>
              <tr>
                <th><strong>Sat</strong></th>
                <td>{{$builder->worksb}}</td>
                <td class="c-secondary">
                </td>
              </tr>
              <tr>
                <th><strong>Sun</strong></th>
                <td>{{$builder->workvs}}</td>
                <td class="c-secondary">
                </td>
              </tr>
            </table>
          </div><!-- .listing-widget -->
          
        </div><!-- .col -->
      </div><!-- .row -->
    </div>
  </div>
</section><!-- .single-listing -->
</div><!-- .page-content -->

@endsection