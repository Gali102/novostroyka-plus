@extends('layout')
@section('title')
    {{$apartment->title}}
@endsection
@section('content')
  @push('style')
      <style>
        .ymaps-2-1-76-map{
          width: 100%;
          height: 100% !important;
        }
      </style>
  @endpush
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
        <span class="breadcrumbs__page c-gray">{{$apartment->title}}</span>
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
                  <h2 class="listing-header__title">{{$apartment->title}}, {!! $apartment->square !!} м<sup><small>2</small></sup> , {!! $apartment->floor !!}/{!! $apartment->floorhome !!} этаж .</h2>
                  <div>
                    <i class="fa fa-check-circle c-green"></i>
                    <span class="c-dusty-gray">Проверенно</span>
                  </div>
                </div>

                <ul class="min-list listing-header__detail">
                  <li>
                    <span>г. {{$apartment->getCitiTitle()}}</span>
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
            О квартире
          </a>
        </li><!-- .listing-tab -->

        <li class="listing-tab">
          <a href="#gallery" id="gallery-link" class="listing-nav-link">
            Фото
          </a>
        </li><!-- .listing-tab -->

        <li class="listing-tab">
          <a href="#add-review" id="add-review-link" class="listing-nav-link">
            Связаться с нами
          </a>
        </li><!-- .listing-tab -->
      </ul><!-- .listing-tabs -->
    </div>
  </nav>
  <div class="listing-main bg-wild-sand">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- <div>
            <p>
              <img src="{{$apartment->getImage()}}" alt="Single Listing">
            </p>
          </div> -->
          @if ($apartment->image2)
          <div id="gallery" class="listing-section bg-white hover-effect" data-matching-link="#gallery-link">
            <div class="listing-section__header">
              <h3 class="listing-section__title">Фото квартиры</h3>
            </div><!-- .listing-section__header -->

            <div class="swiper-container listing-gallery-top">
              <div class="swiper-wrapper">

                @if ($apartment->image2)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image2}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image3)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image3}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image4)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image4}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image5)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image5}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image6)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image6}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image7)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image7}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image8)
                <div class="swiper-slide">
                  <img src="/images/uploads/{{$apartment->image8}}" alt="Listing Image">
                </div>
                @endif
              </div><!-- .swiper-wrapper -->
              <span class="ion-chevron-left c-white listing-button listing-button-prev"></span>
              <span class="ion-chevron-right c-white listing-button listing-button-next"></span>
            </div><!-- .listing-gallery-top -->

            <div class="swiper-container listing-gallery-thumb">
              <div class="swiper-wrapper">
                @if ($apartment->image2)
                    <div class="swiper-slide is-selected">
                  <img src="/images/uploads/{{$apartment->image2}}" alt="Listing Image">
                </div>
                @endif
                @if ($apartment->image3)
                <div class="swiper-slide is-selected">
                  <img src="/images/uploads/{{$apartment->image3}}" alt="Listing Image">
              </div>
            @endif
            @if ($apartment->image4)
            <div class="swiper-slide is-selected">
              <img src="/images/uploads/{{$apartment->image4}}" alt="Listing Image">
            </div>
            @endif
            @if ($apartment->image5)
            <div class="swiper-slide is-selected">
              <img src="/images/uploads/{{$apartment->image5}}" alt="Listing Image">
            </div>
            @endif
            @if ($apartment->image6)
            <div class="swiper-slide is-selected">
              <img src="/images/uploads/{{$apartment->image6}}" alt="Listing Image">
            </div>
            @endif
            @if ($apartment->image7)
              <div class="swiper-slide is-selected">
              <img src="/images/uploads/{{$apartment->image7}}" alt="Listing Image">
              </div>
            @endif
            @if ($apartment->image8)
              <div class="swiper-slide is-selected">
              <img src="/images/uploads/{{$apartment->image8}}" alt="Listing Image">
              </div>
            @endif
              </div><!-- .swiper-wrapper -->
            </div><!-- .listing-gallery-thumb -->
          </div><!-- .listing-section -->
          @endif
          <div id="about" class="listing-section bg-white hover-effect" data-matching-link="#about-link">
            <div class="listing-section__header">
              <h3 class="listing-section__title">Характеристики квартиры</h3>
            </div><!-- .listing-section__header -->

            <p>Этаж квартиры: <strong>{!! $apartment->floor !!}</strong></p>
            <p>Количество этажей в доме: <strong>{!! $apartment->floorhome !!}</strong></p>
            <p>Количество квадратных метров квартиры: <strong>{!! $apartment->square !!} м<sup><small>2</small></sup></strong></p>
            <p>Цена за квартиру: <strong>{!! $apartment->price !!} <i class="fa fa-rub"></i></strong></p>
            <p>Цена за квадратный метр: <strong>{!! $apartment->squareprice !!} <i class="fa fa-rub"></i></strong></p>
            <p>Жилой комплекс: <strong>{{ $apartment->getApartmentZhkTitle()}}</strong></p>
            <p>Тип дома: <strong>{!! $apartment->getApartmentsHometypeTitle()!!}</strong></p>
            <p>Адрес квартиры: <strong>{!! $apartment->getCitiTitle() !!} , {!! $apartment->adress !!}</strong></p>
            <p>Квартал сдачи квартиры: <strong>{!! $apartment->getQuarterTitle() !!}</strong></p>
            <p>Категория квартиры: <strong>{!! $apartment->getApartmentsFinishTitle() !!}</strong></p>
            <p>Оценка квартиры: <strong>{!! $apartment->getApartmentsOcenkaTitle() !!}</strong></p>

            <p>Застройщик: <strong>{!! $apartment->getBuilderTitle() !!}</strong></p>

            <h3 class="listing-section__title" style="margin-top: 35px;">Описание квартиры</h3>
          
            <div style="font-size: 1.2rem;">
              <p>
                {!! $apartment->content !!}
              </p> 
            </div>

          </div><!-- .listing-section -->
          
          @if ($map != null)
          <div class="listing-section bg-white hover-effect" id="newflat-app">
              {{-- {{dd($response)}} --}}
              <div id="yandex__maps" style="
              width: 100%;
              height: 350px;
              margin: 0;
              padding: 0;"></div>
          </div>
          @php
          if($response != ''){
            $n_pos = $response['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
              $pos = str_replace(' ',', ', $n_pos);
          }  
          $pos = '';
          @endphp
          @push('style')
        <script src="https://api-maps.yandex.ru/2.1.68?apikey=b81fd473-e35e-430c-bb10-5b8e24495aa4&lang=ru_RU" type="text/javascript"></script>

              <script>

document.addEventListener("DOMContentLoaded", function() {
  ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('yandex__maps', {
        center: [{{$pos}}],
        zoom: 9
    });
    ymaps.geocode("{{$response['response']['GeoObjectCollection']['metaDataProperty']['GeocoderResponseMetaData']['request']}}", {
        results: 1
    }).then(function (res) {
            // Выбираем первый результат геокодирования.
            var firstGeoObject = res.geoObjects.get(0),
                // Координаты геообъекта.
                coords = firstGeoObject.geometry.getCoordinates(),
                // Область видимости геообъекта.
                bounds = firstGeoObject.properties.get('boundedBy');

            firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
            // Получаем строку с адресом и выводим в иконке геообъекта.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

            // Добавляем первый найденный геообъект на карту.
            myMap.geoObjects.add(firstGeoObject);
            // Масштабируем карту на область видимости геообъекта.
            myMap.setBounds(bounds, {
                // Проверяем наличие тайлов на данном масштабе.
                checkZoomRange: true
            });
        });
}
});

              </script>
          @endpush
          @endif
          <div id="add-review" class="listing-section bg-white hover-effect" data-matching-link="#add-review-link">
            <div class="listing-section__header">
              <h3 class="listing-section__title">Связаться с нами</h3>
            </div><!-- .listing-section__header -->

            <form action="/" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="review-name">Ваше имя *</label>
                    <input
                      type="text"
                      id="review-name"
                      name="name"
                      class="form-input form-input--large form-input--border-c-alto"
                      placeholder="John Doe"
                      required
                    >
                  </div><!-- .form-group -->
                </div><!-- .col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="review-email">Ваш email *</label>
                    <input
                      type="email"
                      id="review-email"
                      name="email"
                      class="form-input form-input--large form-input--border-c-alto"
                      placeholder="johndoe@gmail.com"
                      required
                    >
                  </div><!-- .form-group -->
                </div><!-- .col -->

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="review-message">Ваше сообщение</label>
                    <textarea
                      name="message"
                      id="review-message"
                      rows="10"
                      class="form-input form-input--large form-input--border-c-alto"
                      placeholder="Your review"></textarea>
                  </div><!-- .form-group -->
                </div><!-- .col -->

                <div class="col-md-12">
                  <div class="form-group--submit">
                    <button class="button button--large button--square button--green" type="submit">
                      Отправить сообщение
                    </button>
                  </div>
                </div><!-- .col -->
              </div><!-- .row -->
            </form>
          </div><!-- .listing-section -->
        </div><!-- .col -->

        <div class="col-lg-4">
          <div class="listing-widget bg-white hover-effect">
            <ul class="min-list listing-contact-list">
              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-compass listing-contact__icon"></i>
                <span class="c-primary">г. {{$apartment->getCitiTitle()}}, {!! $apartment->adress !!}</span>
              </li>

              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-phone listing-contact__icon"></i>
                <a href="tel:89870536797">8 (987) 053 6797</a>
              </li>

              <li class="d-flex align-items-center c-silver-charlice listing-contact">
                <i class="fa fa-rub listing-contact__icon"></i>
                <span class="c-primary">{!! $apartment->price !!}</span>
              </li>
            </ul><!-- .listing-contact-list -->

            <div class="listing-social">
              <span class="c-dove-gray">Соц.сети</span>
              <ul class="min-list inline-list social-list">
                <li>
                  <a href="#">
                    <i class="fa fa-facebook-f c-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-google-plus c-google-plus"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-instagram c-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-youtube c-youtube"></i>
                  </a>
                </li>
              </ul><!-- .social-list -->
            </div><!-- .listing-social -->

            <button
              class="button button--green button--block button--pill button--large">Купить квартиру
            </button>
          </div><!-- .listing-widget -->

          <div class="listing-widget bg-white hover-effect">
            <h3 class="listing-widget__title">Форма обраной связи</h3>
            <form action="/" method="post">
              <div class="form-group">
                <label for="name">Ваше имя *</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  required
                  class="form-input form-input--large form-input--border-c-gallery"
                >
              </div><!-- .form-group -->

              <div class="form-group">
                <label for="email">Ваш Email *</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  required
                  class="form-input form-input--large form-input--border-c-gallery"
                >
              </div><!-- .form-group -->

              <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea
                  name="message"
                  id="message"
                  rows="8"
                  class="form-input form-input--large form-input--border-c-gallery"
                ></textarea>
              </div><!-- .form-group -->

              <div class="form-group--submit">
                <button class="button button--green button--large button--pill" type="submit">Отправить заявку</button>
              </div>
            </form>
          </div><!-- .listing-widget -->

          <div class="listing-widget bg-white hover-effect">
            <h3 class="listing-widget__title">Похожие квартиры</h3>
            <ul class="min-list latest-listings">
              <li class="latest-listing">
                <div class="d-flex">
                  <div class="latest-listing__thumbnail">
                    <a href="#">
                      <img src="/images/uploads/latest-listing-1.jpg" alt="Latest Listing">
                    </a>
                  </div><!-- .latest-listing__thumbnail -->

                  <div class="latest-listing__content">
                    <h5 class="latest-listing__name"><a href="#">Название квартиры</a></h5>
                    <div class="latest-listing__review c-gray">
                      <span class="stars-outer" data-rating="4.5">
                        <span class="stars-inner"></span>
                      </span>
                      <span class="t-small">1 900 000 рублей</span>
                    </div>
                    <p class="c-gray latest-listing__desc">г.Стерлитамак, ул. Артема</p>
                  </div><!-- .latest-listing__content -->
                </div>
              </li><!-- .latest-listing -->

              <li class="latest-listing">
                <div class="d-flex">
                  <div class="latest-listing__thumbnail">
                    <a href="#">
                      <img src="/images/uploads/latest-listing-1.jpg" alt="Latest Listing">
                    </a>
                  </div><!-- .latest-listing__thumbnail -->

                  <div class="latest-listing__content">
                    <h5 class="latest-listing__name"><a href="#">Название квартиры</a></h5>
                    <div class="latest-listing__review c-gray">
                      <span class="stars-outer" data-rating="4.5">
                        <span class="stars-inner"></span>
                      </span>
                      <span class="t-small">1 900 000 рублей</span>
                    </div>
                    <p class="c-gray latest-listing__desc">г.Стерлитамак, ул. Артема</p>
                  </div><!-- .latest-listing__content -->
                </div>
              </li><!-- .latest-listing -->

              <li class="latest-listing">
                <div class="d-flex">
                  <div class="latest-listing__thumbnail">
                    <a href="#">
                      <img src="/images/uploads/latest-listing-1.jpg" alt="Latest Listing">
                    </a>
                  </div><!-- .latest-listing__thumbnail -->

                  <div class="latest-listing__content">
                    <h5 class="latest-listing__name"><a href="#">Название квартиры</a></h5>
                    <div class="latest-listing__review c-gray">
                      <span class="stars-outer" data-rating="4.5">
                        <span class="stars-inner"></span>
                      </span>
                      <span class="t-small">1 900 000 рублей</span>
                    </div>
                    <p class="c-gray latest-listing__desc">г.Стерлитамак, ул. Артема</p>
                  </div><!-- .latest-listing__content -->
                </div>
              </li><!-- .latest-listing -->
            </ul><!-- .latest-listings -->
          </div><!-- .listing-widget -->
        </div><!-- .col -->
      </div><!-- .row -->
    </div>
  </div>
</section><!-- .single-listing -->
</div><!-- .page-content -->

@endsection