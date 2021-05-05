@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Раздел аккредитации застройщиков
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем банк</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['builders_accreditation.update',$buildersaccreditation->id], 'method'=>'put'])}}
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название банка</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$buildersaccreditation->title}}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection