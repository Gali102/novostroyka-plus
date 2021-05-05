@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Раздел Жилищных комлексов для квартир
      <small></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Список жк</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <a href="{{route('apartments_zhk.create')}}" class="btn btn-success">Добавить жк</a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Название жк</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($apartments_zhks as $apartments_zhk)
            <tr>
             <td>{{$apartments_zhk->id}}</td>
             <td>{{$apartments_zhk->title}}</td>
             <td><a href="{{route('apartments_zhk.edit', $apartments_zhk->id)}}" class="fa fa-pencil"></a>

               {{Form::open(['route'=>['apartments_zhk.destroy', $apartments_zhk->id], 'method'=>'delete'])}}
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