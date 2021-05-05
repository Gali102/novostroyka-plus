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
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Список застройщиков</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('builders.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Город</th>
                  <th>Адрес</th>
                  <th>Телефон</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($builders as $builder)
                <tr>
                  <td>{{$builder->id}}</td>
                  <td>{{$builder->title}}</td>
                  <td>{{$builder->getCitiTitle()}}</td>
                  <td>{{$builder->adress}}</td>
                  <td>{{$builder->phone}}</td>
                  <td>
                  <a href="{{route('builders.edit', $builder->id)}}" class="fa fa-pencil"></a> 

                  {{Form::open(['route'=>['builders.destroy', $builder->id], 'method'=>'delete'])}}
                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                     <i class="fa fa-remove"></i>
                    </button>

                     {{Form::close()}}
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection