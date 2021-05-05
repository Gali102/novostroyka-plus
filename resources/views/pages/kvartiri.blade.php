@extends('layout')
@section('title')
    Квартиры
@endsection
@section('content') 

<section class="hello-section listing-list page-section listing-list--layout-1">

  <h3 class="text-center">Квартиры</h3>

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
    <div class="col-md-9">
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
          </div>
        </div>
  </div>
</div>
</section>

@endsection