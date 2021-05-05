@extends('layout')

@section('content')

<section class="hello-section listing-list page-section listing-list--layout-1">

  <h3 class="text-center">Банки</h3>

  <div class="hello_container">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card__wrapper listing hover-effect">
          <h4 class="text-center mt-2 mb-2">Спискок банков</h4>
          <div class="row" style="justify-content: space-evenly">
           @foreach($banks as $bank)
           <div class="list-view__item">
            <div class="listing hover-effect">
              <div class="d-sm-flex align-items-sm-center listing__wrapper">
                <div class="listing__thumbnail">
                  <a href="{{route('banki.bankshow', $bank->slug)}}">
                    <img src="{{$bank->getImage()}}" alt="{{$bank->title}}" >
                  </a>
                </div><!-- .listing__thumbnail -->
                <div class="d-flex justify-content-between align-items-center listing__detail">
                  <div class="listing__detail-left">
                    <h3 class="listing__title">
                      <a href="{{route('banki.bankshow', $bank->slug)}}">{{$bank->title}}</a>
                    </h3>
                    <p class="listing__review c-dusty-gray">
                      @if(!$bank->reviewbank->isEmpty())
                      <span>Количество отзывов: {{$bank->getReviewsBank()->count()}}</span>
                      @else
                      <span>Нет отзывов</span>
                      @endif
                    </p>
                    <p class="listing__location c-dusty-gray no-b-margin">
                      <i class="fa fa-map-marker"></i>
                      г. {{$bank->getCitiTitle()}}
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