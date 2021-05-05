@extends('layout')
@section('title')
    Главная
@endsection
@section('content')

{{-- <section class="page-banner page-banner--layout-1 parallax">
    <div class="container">
        <div class="page-banner__container animated fadeInUp">
            <div class="page-banner__textcontent t-center">
                <h2 class="page-banner__title c-white">Подберите свою квартиру</h2>
                <p class="page-banner__subtitle c-white">Найдите лучшие места, там где бы хотели жить.</p>
            </div><!-- .page-banner__textcontent -->

            <div class="main-search-container">
                <form class="main-search main-search--layout-1 bg-mirage">
                    <div class="main-search__group main-search__group--primary">
                        <label for="main-search-name" class="c-white">Что ищете?</label>
                        <input type="text" name="name" id="main-search-name" class="form-input" placeholder="двушку">
                    </div><!-- .main-search__group -->

                    <div class="main-search__group main-search__group--secondary">
                        <label for="main-search-location" class="c-white">Где ищете?</label>
                        <input type="text" name="location" id="main-search-location" class="form-input" placeholder="Стерлитамак">
                    </div><!-- .main-search__group -->
                    
                    <div class="main-search__group main-search__group--tertiary">
                        <button type="submit" class="button button--medium button--square button--primary">
                            <i class="fa fa-search"></i> Поиск
                        </button>
                    </div>
                </form>
            </div><!-- .main-search-container -->

            <div class="locations-container t-center">
                <ul class="min-list inline-list locations locations--layout-1">
                    <li class="location">
                        <a href="#" class="c-white"><i class=""></i>Однокомнатная</a>
                    </li>
                    <li class="location">
                        <a href="#" class="c-white"><i class=""></i>Двухкомнатная</a>
                    </li>
                    <li class="location">
                        <a href="#" class="c-white"><i class=""></i>Трехкомнатная</a>
                    </li>
                    <li class="location">
                        <a href="#" class="c-white"><i class=""></i>Ипотечный калькулятор</a>
                    </li>
                </ul>
            </div>
        </div><!-- .page-banner__container -->
    </div><!-- .container -->
</section> --}}
<section class="hello-section listing-list page-section listing-list--layout-1">
<div class="hello_container">
    <div class="row">
        <div class="col-md-3">
            <div class="listing hover-effect card__wrapper">
                <h4 class="text-center mt-2 mb-2">Фильтр</h4>
                <form action="{{route('search.mainpage')}}" method="get" class="row" style="padding: 1.5em;
                background-color: #fff;justify-content: space-between;align-items:center">
                <div class="form-group" style="width: 100%;">
                    <label for="city_sr">Город</label>
                    {{-- <input type="text" name="city" placeholder="Желаемый город" id="city_sr" class="form-input form-input--pill form-input--border-c-gallery"> --}}
                    <select required name="city" id="city_sr" class="form-input form-input--pill form-input--border-c-gallery">
                      <option value="">Выберите город</option>
                      @foreach ($cities as $city)
                      <option value="{{$city->id}}">{{$city->title}}</option> 
                      @endforeach
                  </select>
              </div>
              <div class="form-group" style="width: 100%;">
                <label for="apart_type">Тип строения</label>
                {{-- <input type="text" name="apart_type" placeholder="Квартир, пентхаус, частный дом" id="apart_type" class="form-input form-input--pill form-input--border-c-gallery"> --}}
                <select name="apart_type" class="form-input form-input--pill form-input--border-c-gallery" id="apart_type">
                  <option value="">Выберите тип строения</option>
                  @foreach ($apartment_category as $ac)
                  <option value={{$ac->id}}>{{$ac->title}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group" style="width: 100%;">
            <label for="quality_type">Тип отделки</label>
            <select name="quality_type" class="form-input form-input--pill form-input--border-c-gallery" id="quality_type">
              <option value="">Выберите тип отделки</option>
              @foreach ($quality as $qt)
              <option value={{$qt->id}}>{{$qt->title}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group" style="width: 100%;">
        <label for="builders">Застройщики</label>
        <select name="builders_name" class="form-input form-input--pill form-input--border-c-gallery" id="builders">
          <option value="">Выберите застройщика</option>
          @foreach ($builders as $bld)
          <option value={{$bld->id}}>{{$bld->title}}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group" style="width: 100%;">
    <label for="quarter">Квартал сдачи</label>
    <select name="quarter_time" class="form-input form-input--pill form-input--border-c-gallery" id="quarter">
      <option value="">Выберите квартал сдачи</option>
      @foreach ($quarter as $qrt)
      <option value={{$qrt->id}}>{{$qrt->title}}</option>
      @endforeach
  </select>
</div>
<div class="form-group" style="width: 100%;">
    <label for="hometypes">Тип дома</label>
    <select name="hometypes_name" class="form-input form-input--pill form-input--border-c-gallery" id="hometypes">
      <option value="">Выберите тип дома</option>
      @foreach ($hometypes as $ht)
      <option value={{$ht->id}}>{{$ht->title}}</option>
      @endforeach
  </select>
</div>
<div class="form-group" style="width: 100%;">
    <label for="quality_type" class="text-center mx-auto">Цена</label> <br>
    <div class="form-row">
      <div class="col">
        <input type="text" name="price_from" class="form-control" placeholder="От">
    </div>
    <div class="col">
        <input type="text" name='price_to' class="form-control" placeholder="До">
    </div>
</div>
</div>
<div class="form-group" style="width: 100%;">
    <label for="quality_type" class="text-center mx-auto">Площадь</label> <br>
    <div class="form-row">
      <div class="col">
        <input type="text" name="sqrt_from" class="form-control" placeholder="От">
    </div>
    <div class="col">
        <input type="text" name="sqrt_to" class="form-control" placeholder="До">
    </div>
</div>
</div>

      <div class="form-group" style="margin: unset">
        <button type="submit" class="submit__btn">Поиск</button>
    </div>
</form>
</div>
        </div>
        <div class="row result_div col-md-9">
            <div class="card__wrapper listing hover-effect">
                <h4 class="text-center mt-2 mb-2">Спискок квартир</h4>
                <div class="row" style="justify-content: space-evenly">
                    @foreach($apartments as $apartment)
                    <div class="card news_card mt-2 mb-2">
                        <div class="head__news">
                            <div class="post-thumbnail">
                                <a href="{{route('kvartiri.kvartirishow', $apartment->slug)}}">
                                    <img src="{{$apartment->getImage()}}" alt="{{$apartment->title}}" class="card-img-top"  height="155px;" width="100%;">
                                </a>
                            </div>
            
                            <div class="card-body">
                                <h3 class="news__title card-title">
                                    <a href="{{route('kvartiri.kvartirishow', $apartment->slug)}}">{{$apartment->title}}</a>
                                </h3>
                                    {{-- @php
                                        echo substr($post->description, 0, 100);
                                    @endphp 
                                    <a href="{{route('blog.show', $post->slug)}}" class="card-link">...читать далее</a> --}}
                                        {{-- @if($post->hasCategory()) --}}
                                <p class="post-meta t-small">
                                    <span>
                                        <a class="c-dusty-gray" href="#"> {{$apartment->apartmentcategoty->title}}</a>
                                </span>
                                    <p class="listing__location c-dusty-gray">
                                        <i class="fa fa-map-marker"></i>
                                        г. {{$apartment->getCitiTitle()}}
                                    </p>
                                    
                                </p>
                                {{-- @endif  --}}

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="t-center" style="margin-top:1.5em; padding-bottom:1em">
                    <a href="/kvartiri" class="submit__btn">Посмотреть все квартиры</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="listing-list page-section listing-list--layout-1">
    <h4 class="text-center">Новости и статьи</h4>
    <div class="container">
        {{-- <h2 class="page-section__title t-center">В нашей базе более чем {{$count_apart}} квартир</h2> --}}
        <div class="card__wrapper listing hover-effect">
            
            <div class="row" style="justify-content: space-evenly">
                @foreach($recentPosts as $post)
                <div class="card news_card">
                    <div class="head__news">
                        <div class="post-thumbnail">
                            <a href="{{route('blog.show', $post->slug)}}">
                                <img src="{{$post->getImage()}}" class="card-img-top" alt="{{$post->title}}" height="155px;" width="100%;">
                            </a>
                        </div>
        
                        <div class="card-body">
                            <h3 class="news__title card-title">
                                <a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a>
                            </h3>
                                @php
                                    echo substr($post->description, 0, 100);
                                @endphp 
                                <a href="{{route('blog.show', $post->slug)}}" class="card-link">...читать далее</a>
                                    @if($post->hasCategory())
                            <p class="post-meta t-small">
                                <span>
                                        <a class="c-dusty-gray" href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                                </span>
                            </p>
                            @endif 

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="t-center load-more">
            <a href="/blog" class="submit__btn">Посмотреть все новости</a>
        </div>
    </div><!-- .container -->
</section><!-- .listing-list -->

<section class="page-section testimonials-container testimonial--layout-1 bg-wild-sand">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="testimonials">
                    <h2 class="page-section__title">Советы</h2>
                    <div class="swiper-container testimonial-container">
                        <div class="swiper-wrapper testimonial-wrapper">
                            <div class="swiper-slide testimonial">
                                <p class="testimonial-content c-dove-gray">
                                    Митч и я путешествовали повсюду, но это был один из лучших моих отпусков.
                                    Митч будет писать вам о будущих поездках. Убедитесь, что Митч заказывает бизнес-класс или первый класс в будущем.
                                </p>
                                <div class="testimonial-footer">
                                    <div class="testimonial-avatar">
                                        {{-- <img src="/images/uploads/testimonial-avatar.png" class="Client Avatar" alt="Testimonial Image"> --}}
                                    </div>

                                    <div class="testimonial-client">
                                        {{-- <span class="testimonial-client-name">- Роберт Ф.</span>
                                        <span class="testimonial-client-location">Стерлитамак</span> --}}
                                    </div>
                                </div><!-- .testimonial-footer -->
                            </div><!-- .testimonial -->

                            <div class="swiper-slide testimonial">
                                <p class="testimonial-content c-dove-gray">
                                     Митч и я путешествовали повсюду, но это был один из лучших моих отпусков.
                                    Митч будет писать вам о будущих поездках. Убедитесь, что Митч заказывает бизнес-класс или первый класс в будущем.
                                </p>
                                <div class="testimonial-footer">
                                    <div class="testimonial-avatar">
                                        {{-- <img src="/images/uploads/testimonial-avatar.png" class="Client Avatar" alt="Testimonial Image"> --}}
                                    </div>

                                    <div class="testimonial-client">
                                        {{-- <span class="testimonial-client-name">- Роберт Ф.</span>
                                        <span class="testimonial-client-location">Стерлитамак</span> --}}
                                    </div>
                                </div><!-- .testimonial-footer -->
                            </div><!-- .testimonial -->

                            <div class="swiper-slide testimonial">
                                <p class="testimonial-content c-dove-gray">
                                    Митч и я путешествовали повсюду, но это был один из лучших моих отпусков.
                                    Митч будет писать вам о будущих поездках. Убедитесь, что Митч заказывает бизнес-класс или первый класс в будущем.
                                </p>
                                <div class="testimonial-footer">
                                    <div class="testimonial-avatar">
                                        {{-- <img src="/images/uploads/testimonial-avatar.png" class="Client Avatar" alt="Testimonial Image"> --}}
                                    </div>

                                    <div class="testimonial-client">
                                        {{-- <span class="testimonial-client-name">- Роберт Ф.</span>
                                        <span class="testimonial-client-location">Стерлитамак</span> --}}
                                    </div>
                                </div><!-- .testimonial-footer -->
                            </div><!-- .testimonial -->
                        </div><!-- .testimonial-wrapper -->

                        <div class="testimonial-button-container">
                            <span class="ion-chevron-left testimonial-button testimonial-button-left"></span>
                            <span class="ion-chevron-right testimonial-button testimonial-button-right"></span>
                        </div>
                    </div><!-- .testimonial-container -->
                </div><!-- .testimonials -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .testimonial -->

{{-- <section class="ads ads--layout-1 parallax">
    <div class="t-center ads__container">
        <div class="container">
            <h2 class="ads__title">Умный заголовок</h2>
            <p class="ads__subtitle">
                Умная фраза
            </p>
        </div>
    </div>
</section><!-- .ads --> --}}

{{-- <section class="news page-section news--layout-1">
  <div class="container">
    <h2 class="page-section__title t-center">Советы и статьи</h2>
    <div class="row">

        @foreach($recentPosts as $post)
        <div class="col-md-4">
            <div class="post sticky">
                <div class="post-thumbnail">
                    <a href="{{route('blog.show', $post->slug)}}">
                        <img src="{{$post->getImage()}}" alt="{{$post->title}}" height="205px;" width="100%;">
                    </a>
                </div>

                <div class="post-content">
                    <h3 class="post-title">
                        <a href="{{route('blog.show', $post->slug)}}">{{$post->getDate()}}</a>
                    </h3>
                    <p class="post-meta t-small">
                        <span>
                            <a href="{{route('blog.show', $post->slug)}}" class="c-dusty-gray">{{$post->getDate()}}</a>
                        </span>
                        <span>
                            @if($post->hasCategory())
                                <a class="c-dusty-gray" href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                            @endif 
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        
    </div><!-- .row -->
  </div><!-- .container -->
</section><!-- .news --> --}}

@endsection