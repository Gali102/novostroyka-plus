@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Раздел карты
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Список карт</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('maps.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Город</th>
                  <th>Улица</th>
                  <th>Номер дома</th>
                  <th>Номер квартиры</th>
                  {{-- <th></th> --}}
                </tr>
                </thead>
                <tbody>
                @foreach($maps as $map)
                <tr>
                  <td>{{$map->id}}</td>
                  <td>{{$map->apartment->title}}</td>
                  <td>{{$map->city}}</td>
                  <td>{{$map->street}}</td>
                  <td>{{$map->house_number}}</td>
                  <td>{{$map->flat_number}}</td>
                  <td>
                  <a href="{{route('maps.edit', $map->id)}}" class="fa fa-pencil"></a> 

                  {{Form::open(['route'=>['maps.destroy', $map->id], 'method'=>'delete'])}}
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