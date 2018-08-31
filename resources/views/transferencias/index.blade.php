@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="box box-success col-md-12 col-sm-12 col-xl-12">
            <div class="box-header">
                <h3 class="box-title">Listado de SubSeries Tranferidas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body col-md-12">
                <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dependencia</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>

                        <th>Transferir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_series as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->nombreSubSeries}}</td>
                            <td>{{$post->codigoSubSeries}}</td>
                            <td>{{$post->gestionSubSeries}}</td>
                            <td>{{$post->centralSubSeries}}</td>
                            @if($post->estado == '3')
                                <td><span class="label label-success">Transferido</span></td>

                            @else()
                                <td>
                                    <form  method="post" action="{{action('StoreController@update', $post->id)}}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <button class="btn btn-danger btn-sm">Transferir</button>
                                    </form>
                                </td>
                            @endif()
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Dependencia</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>

                        <th>Transferir</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
