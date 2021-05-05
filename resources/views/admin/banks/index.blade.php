@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Раздел банков
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Список банков</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('banks.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Картинка</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank)
                <tr>
                  <td>{{$bank->id}}</td>
                  <td>{{$bank->title}}</td>
                  <td>{{$bank->getCitiTitle()}}</td>
                  <td>
                    <img src="{{$bank->getImage()}}" alt="" width="100">
                  </td>
                  <td>
                  <a href="{{route('banks.edit', $bank->id)}}" class="fa fa-pencil"></a> 

                  {{Form::open(['route'=>['banks.destroy', $bank->id], 'method'=>'delete'])}}
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