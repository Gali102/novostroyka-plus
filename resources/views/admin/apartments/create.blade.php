@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Раздел квартиры
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
  {{Form::open([
    'route' => 'apartments.store',
    'files' =>  true
  ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем квартиру</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название(например "1-кмнт квартира")</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
            </div>
            
            <div class="form-group">
              <label for="exampleInputFile">Лицевая картинка(не обязательно)</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Галлерея</label>
                <input type="file" name="image2" id="">
                <input type="file" name="image3" id="">
                <input type="file" name="image4" id="">
                <input type="file" name="image5" id="">
                <input type="file" name="image6" id="">
                <input type="file" name="image7" id="">
                <input type="file" name="image8" id="">
              </div>
            <div class="form-group">
              <label>Город</label>
              {{Form::select('citi_id', 
                $Cities, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Отделка</label>
              {{Form::select('apartmentsfinish_id', 
                $ApartmentsFinishs, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Категория квартиры</label>
              {{Form::select('apartmentcategoty_id', 
                $ApartmentCategories, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Квартал сдачи квартиры</label>
              {{Form::select('quarter_id', 
                $Quarters, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Тип дома квартиры</label>
              {{Form::select('apartmentshometype_id', 
                $ApartmentsHometypes, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>ЖК квартиры</label>
              {{Form::select('apartmentszhk_id', 
                $ApartmentsZhks, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Оценка квартиры</label>
              {{Form::select('apartmentsocenka_id', 
                $ApartmentsOcenkas, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Застройщик</label>
              {{Form::select('builder_id', 
                $Builders, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Адрес(Указывать без города)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="adress" value="{{old('adress')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Количество квадратных метров</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="square" value="{{old('square')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Какой этаж</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="floor" value="{{old('floor')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Скольки этажный дом</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="floorhome" value="{{old('floorhome')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Цена за квартиру</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{old('price')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Цена за квадратный метр (если известно)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="squareprice" value="{{old('squareprice')}}">
            </div>

            <hr>

            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="is_featured">
              </label>
              <label>
                Рекомендовать
              </label>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="status">
              </label>
              <label>
                Черновик
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{old('content')}}</textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  {{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection