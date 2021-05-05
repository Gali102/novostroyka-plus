@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Раздел типы домов(кирпичный, монолитный и т.д.)
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
          <a href="{{route('apartments_hometype.create')}}" class="btn btn-success">Добавить</a>
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
            @foreach($apartments_hometypes as $apartments_hometype)
            <tr>
             <td>{{$apartments_hometype->id}}</td>
             <td>{{$apartments_hometype->title}}</td>
             <td><a href="{{route('apartments_hometype.edit', $apartments_hometype->id)}}" class="fa fa-pencil"></a>

               {{Form::open(['route'=>['apartments_hometype.destroy', $apartments_hometype->id], 'method'=>'delete'])}}
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