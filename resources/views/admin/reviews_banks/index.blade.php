@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Раздел отзывов у банков
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список отзывов у банков</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="create.html" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Текст</th>
                        <th>Банк</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviewbanks as $reviewbank)
                    <tr>
                        <td>{{$reviewbank->id}}</td>
                        <td>{{$reviewbank->text}}</td>
                        <td>{{$reviewbank->getReviewBankTitle()}}</td>
                        <td>
                            @if($reviewbank->status == 1)
                            <a href="/admin/reviews_banks/toggle/{{$reviewbank->id}}" class="fa fa-lock"></a>
                            @else
                            <a href="/admin/reviews_banks/toggle/{{$reviewbank->id}}" class="fa fa-thumbs-o-up"></a>
                            @endif
                            {{Form::open(['route'=>['reviews_banks.destroy', $reviewbank->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Вы уверенны?')" type="submit" class="delete">
                                <i class="fa fa-remove"></i>
                            </button>

                            {{Form::close()}}
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