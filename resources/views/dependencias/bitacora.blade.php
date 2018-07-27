@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">.</div>
        <div class="row col-md-12 col-sm-12 col-xl-12">
            <div class="col-md-12 col-sm-12 col-xl-12">

                <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
                    <div class="box-header">
                        <h3 class="box-title">Listado de dependencias</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-md-12">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>Bitacora ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Usuario</th>
                                <th>acción</th>
                                <th>Fecha de inserción </th>
                                <th>Recuperar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bitacora as $post)
                                <tr>
                                    <form method="post" action="{{action('BitacorasDependenciasController@update', $post->bitacoraDependencias_id)}}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="nombreDependencias" type="hidden" value="{{$post->nombreDependencias}}">
                                        <input name="codigoDependencias" type="hidden" value="{{$post->codigoDependencias}}">
                                        <input name="action" type="hidden" value="{{$post->action}}">
                                    <td>{{$post->bitacoraDependencias_id}}</td>
                                    <td>{{$post->nombreDependencias}}</td>
                                    <td>{{$post->codigoDependencias}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>
                                        @if($post->action == 'create')<span class="label label-success">Creado </span>@endif
                                            @if($post->action == 'update')<span class="label label-warning">Actualizado </span>@endif
                                                @if($post->action == 'delete')<span class="label label-danger">Eliminado </span>@endif
                                                @if($post->action == 'recover')<span class="label label-info">Recuperado </span>@endif
                                    </td>
                                    <td>{{$post->created_at}}</td>
                                    <td> <button class="btn btn-primary"><i class="fa  fa-recycle"></i></button> </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>acción</th>
                                <th>Fecha de inserción </th>
                                <th>Recuperar</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    </div>
    </div>
@endsection
