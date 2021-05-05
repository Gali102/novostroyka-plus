@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Раздел застройщики
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
  {{Form::open([
    'route' => 'builders.store',
    'files' =>  true
  ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем застройщика</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
            </div>
            
            <div class="form-group">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>

            <div class="form-group">
              <label>Город</label>
              {{Form::select('citi_id', 
                $Cities, 
                null, 
                ['class' => 'form-control select2'])
              }}
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Адрес</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="adress" value="{{old('adress')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Телефон</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="phone" value="{{old('phone')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Почта</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{old('email')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Сайт</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="site" value="{{old('site')}}">
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в понедельник. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workpn" value="{{old('workpn')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы во вторник. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workvt" value="{{old('workvt')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в среду. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="worksr" value="{{old('worksr')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в четверг. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workch" value="{{old('workch')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в пятницу. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workpt" value="{{old('workpt')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в субботу. (Например: Выходной)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="worksb" value="{{old('worksb')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в воскресенье. (Например: Выходной)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workvs" value="{{old('workvs')}}">
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Группа в ВК</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="vk" value="{{old('vk')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Инстаграм</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="inst" value="{{old('inst')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Фейсбук</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="fb" value="{{old('fb')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Твиттер</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="tvit" value="{{old('tvit')}}">
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