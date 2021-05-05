@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Раздел карт
          </h1>
    </section>
    <section class="content">
      <div class="box">
      <form action='{{route('maps.store')}}' method="POST">
        @csrf
        <div class="box-header with-border">
          <h3 class="box-title">Добавление карты</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="flatselect">Название апартаментов</label>
              {{-- <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder=""> --}}
              <select class="form-control" name="apartment_id" id="flatselect" required>
                  @foreach ($apartment as $item)
                      <option value="{{$item->id}}">{{$item->id}} | {{$item->title}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="cityselect">Нименование города</label> 
                <select name="city" id="cityselect" class="form-control" required>
                    @foreach ($cities as $city)
                      <option value="{{$city->title}}">{{$city->title}}</option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cityselect">Нименование улици</label> 
                <input name="street" id="streetselect" class="form-control" placeholder="Пушкина" title="не нужно писать улица или ул это уже вложено в запрос" required>
            </div>
            <div class="form-group">
                <label for="cityselect">Номер дома</label> 
                <input name="house_number" id="houseselect" class="form-control" placeholder="101">
            </div>
            <div class="form-group">
                <label for="cityselect">Номер квартиры</label> 
                <input name="flat_number" id="flatselect" class="form-control" placeholder="1">
            </div>
        </div>
      </div>
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
    </form>
      </div>
    </section>
  </div>

@endsection