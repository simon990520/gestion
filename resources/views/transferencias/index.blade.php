@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
            <div class="box-header">
                <h3 class="box-title">Listado de Series</h3>
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
                    @foreach($series as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreDependencias}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->codigoSeries}}</td>
                            <td>{{$post->gestion}}</td>
                            <td>{{$post->central}}</td>
                            @if($post->estado != '2')
                                <td><span class="label label-success">Transferido</span></td>

                            @elseif($post->estado = '3')
                            <td>
                                <form  method="post" action="{{action('TransferenciasController@update', $post->id)}}">
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
