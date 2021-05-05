@extends('layout')

@section('content')

<section class="hello-section listing-list page-section listing-list--layout-1">

  <h3 class="text-center">Застройщики</h3>

  <div class="hello_container">
    <div class="row">
      <div class="col-md-3">
        <div class="listing hover-effect card__wrapper">
          <h4 class="text-center mt-2 mb-2">Фильтр</h4>
          <div class="form-group">
            <label for="city_sr">Город</label>
            <select name="city" id="city_sr" class="form-input form-input--pill form-input--border-c-gallery">
              
            </select>
          </div>
          
          <div class="form-group" style="margin: unset">
            <button type="submit" class="submit__btn">Поиск</button>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="card__wrapper listing hover-effect">
          <h4 class="text-center mt-2 mb-2">Спискок застройщиков</h4>
          <div class="row" style="justify-content: space-evenly">
           @foreach($builders as $builder)
           <div class="list-view__item">
            <div class="listing hover-effect">
              <div class="d-sm-flex align-items-sm-center listing__wrapper">
                <div class="listing__thumbnail">
                  <a href="{{route('builder.buildershow', $builder->slug)}}">
                    <img src="{{$builder->getImage()}}" alt="{{$builder->title}}" >
                  </a>
                </div><!-- .listing__thumbnail -->
                <div class="d-flex justify-content-between align-items-center listing__detail">
                  <div class="listing__detail-left">
                    <h3 class="listing__title">
                      <a href="{{route('builder.buildershow', $builder->slug)}}">{{$builder->title}}</a>
                    </h3>
                    <p class="listing__review c-dusty-gray">
                      @if(!$builder->review->isEmpty())
                      <span>Количество отзывов: {{$builder->getReviews()->count()}}</span>
                      @else
                      <span>Нет отзывов</span>
                      @endif
                    </p>
                    <p class="listing__location c-dusty-gray no-b-margin">
                      <i class="fa fa-map-marker"></i>
                      г. {{$builder->getCitiTitle()}}
                    </p>
                  </div>
                </div><!-- .listing__detail -->
              </div><!-- .listing__wrapper -->
            </div><!-- .listing -->
          </div><!-- .list-view__item -->
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection