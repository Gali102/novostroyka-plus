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
    'route' =>  ['builders.update', $builder->id],
    'files' =>  true,
    'method'  =>  'put'
  ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем застройщика</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$builder->title}}" name="title">
            </div>
            
            <div class="form-group">
              <img src="{{$builder->getImage()}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <label>Город</label>
              {{Form::select('citi_id', 
                $cities, 
                $builder->getCitiID(), 
                ['class' => 'form-control select2'])
              }}
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Адрес</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="adress" value="{{$builder->adress}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Телефон</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="phone" value="{{$builder->phone}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Почта</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{$builder->email}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Сайт</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="site" value="{{$builder->site}}">
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в понедельник. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workpn" value="{{$builder->workpn}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы во вторник. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workvt" value="{{$builder->workvt}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в среду. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="worksr" value="{{$builder->worksr}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в четверг. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workch" value="{{$builder->workch}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в пятницу. (Например: 9:00 - 18:00)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workpt" value="{{$builder->workpt}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в субботу. (Например: Выходной)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="worksb" value="{{$builder->worksb}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Время работы в воскресенье. (Например: Выходной)</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="workvs" value="{{$builder->workvs}}">
            </div>

            <hr>

            <div class="form-group">
              <label for="exampleInputEmail1">Группа в ВК</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="vk" value="{{$builder->vk}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Инстаграм</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="inst" value="{{$builder->inst}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Фейсбук</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="fb" value="{{$builder->fb}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Твиттер</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="tvit" value="{{$builder->tvit}}">
            </div>

            <hr>

            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$builder->date}}" name="date">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
              {{Form::checkbox('is_featured', '1', $builder->is_featured, ['class'=>'minimal'])}}
              </label>
              <label>
                Рекомендовать
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                {{Form::checkbox('status', '1', $builder->status, ['class'=>'minimal'])}}
              </label>
              <label>
                Черновик
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$builder->description}}</textarea>
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$builder->content}}</textarea>
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