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
    'route' =>  ['apartments.update', $apartment->id],
    'files' =>  true,
    'method'  =>  'put'
  ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем квартиру</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название(например "1-кмнт квартира")</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$apartment->title}}" name="title">
            </div>
            
            <div class="form-group">
              <img src="{{$apartment->getImage()}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <hr>
            <div class="form-group">
              @push('style')
                  <style>
                    .input_and_img{
                      display: flex;
                      flex-direction: row;
                    }
                  </style>
              @endpush
                <label for="">Галлерея</label>
                <div class="input_and_img">
              <img src="/images/uploads/{{$apartment->image2}}" alt="" class="img-responsive" width="200">
                <input type="file" name="image2" id="">
              </div>
              <div class="input_and_img">
                <img src="/images/uploads/{{$apartment->image3}}" alt="" class="img-responsive" width="200">
                  <input type="file" name="image3" id="">
                </div>
                <div class="input_and_img">
                  <img src="/images/uploads/{{$apartment->image4}}" alt="" class="img-responsive" width="200">
                    <input type="file" name="image4" id="">
                  </div>
                  <div class="input_and_img">
                    <img src="/images/uploads/{{$apartment->image5}}" alt="" class="img-responsive" width="200">
                      <input type="file" name="image5" id="">
                    </div>
                    <div class="input_and_img">
                      <img src="/images/uploads/{{$apartment->image6}}" alt="" class="img-responsive" width="200">
                        <input type="file" name="image6" id="">
                      </div>
                      <div class="input_and_img">
                        <img src="/images/uploads/{{$apartment->image7}}" alt="" class="img-responsive" width="200">
                          <input type="file" name="image7" id="">
                        </div>
                        <div class="input_and_img">
                          <img src="/images/uploads/{{$apartment->image8}}" alt="" class="img-responsive" width="200">
                            <input type="file" name="image8" id="">
                          </div>
              </div>
            <div class="form-group">
              <label>Город</label>
              {{Form::select('citi_id', 
                $cities, 
                $apartment->getCitiID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Вид отделки</label>
              {{Form::select('apartmentsfinish_id', 
                $apartmentsfinishs, 
                $apartment->getApartmentsFinishID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Категория квартиры</label>
              {{Form::select('apartmentcategoty_id', 
                $apartmentcategories, 
                $apartment->getApartmentCategotyID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Квартал сдачи квартиры</label>
              {{Form::select('quarter_id', 
                $quarters, 
                $apartment->getQuarterID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Тип дома квартиры</label>
              {{Form::select('apartmentshometype_id', 
                $apartmentshometypes, 
                $apartment->getApartmentsHometypeID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>ЖК квартиры</label>
              {{Form::select('apartmentszhk_id', 
                $apartmentszhks, 
                $apartment->getApartmentsZhkID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Оценка квартиры</label>
              {{Form::select('apartmentsocenka_id', 
                $apartmentsocenkas, 
                $apartment->getApartmentsOcenkaID(), 
                ['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Застройщик</label>
              {{Form::select('builder_id', 
                $builders, 
                $apartment->getBuilderID(), 
                ['class' => 'form-control select2'])
              }}
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Адрес(Указывать без города)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="adress" value="{{$apartment->adress}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Количество квадратных метров</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="square" value="{{$apartment->square}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Какой этаж</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="floor" value="{{$apartment->floor}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Скольки этажный дом</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="floorhome" value="{{$apartment->floorhome}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Цена за квартиру</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{$apartment->price}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Цена за квадратный метр (если известно)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="squareprice" value="{{$apartment->squareprice}}">
            </div>

            <hr>

            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$apartment->date}}" name="date">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
              {{Form::checkbox('is_featured', '1', $apartment->is_featured, ['class'=>'minimal'])}}
              </label>
              <label>
                Рекомендовать
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                {{Form::checkbox('status', '1', $apartment->status, ['class'=>'minimal'])}}
              </label>
              <label>
                Черновик
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$apartment->description}}</textarea>
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$apartment->content}}</textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
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