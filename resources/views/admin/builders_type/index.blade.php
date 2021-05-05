@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Раздел типы застройщиков
      <small></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Список типов</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <a href="{{route('builders_type.create')}}" class="btn btn-success">Добавить</a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Название</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($buildertypes as $buildertype)
            <tr>
             <td>{{$buildertype->id}}</td>
             <td>{{$buildertype->title}}</td>
             <td><a href="{{route('builders_type.edit', $buildertype->id)}}" class="fa fa-pencil"></a>

               {{Form::open(['route'=>['builders_type.destroy', $buildertype->id], 'method'=>'delete'])}}
               <button onclick="return confirm('Вы уверенны?')" type="submit" class="delete">
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