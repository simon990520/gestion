@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">.</div>
        <div class="row col-md-12 col-sm-12 col-xl-12">
            <div class="col-md-12 col-sm-12 col-xl-12">

                <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Series</h3>
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
                                    <form method="post" action="{{action('BitacoraSerieController@update', $post->serie_id)}}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="dependencias_id" type="hidden" value="{{$post->dependencias_id}}">
                                        <input name="nombreSeries" type="hidden" value="{{$post->nombreSeries}}">
                                        <input name="codigoSeries" type="hidden" value="{{$post->codigoSeries}}">
                                        <input name="original" type="hidden" value="{{$post->original}}">
                                        <input name="copia" type="hidden" value="{{$post->copia}}">
                                        <input name="soporte" type="hidden" value="{{$post->soporte}}">
                                        <input name="gestion" type="hidden" value="{{$post->gestion}}">
                                        <input name="central" type="hidden" value="{{$post->central}}">
                                        <input name="ctfisico" type="hidden" value="{{$post->ctfisico}}">
                                        <input name="ctelectronico" type="hidden" value="{{$post->ctelectronico}}">
                                        <input name="microfilmacion" type="hidden" value="{{$post->microfilmacion}}">
                                        <input name="digitalizacion" type="hidden" value="{{$post->digitalizacion}}">
                                        <input name="seleccion" type="hidden" value="{{$post->seleccion}}">
                                        <input name="eliminacion" type="hidden" value="{{$post->eliminacion}}">
                                        <input name="action" type="hidden" value="{{$post->action}}">
                                        <td>{{$post->serie_id}}</td>
                                        <td>{{$post->nombreSeries}}</td>
                                        <td>{{$post->codigoSeries}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>
                                            @if($post->action == 'create')<input type="hidden" name="eliminar" value="1"><span class="label label-success">Creado </span>@endif
                                            @if($post->action == 'update')<input type="hidden" name="eliminar" value="1"><span class="label label-warning">Actualizado </span>@endif
                                            @if($post->action == 'delete')<input type="hidden" name="eliminar" value="0"><span class="label label-danger">Eliminado </span>@endif
                                            @if($post->action == 'recover')<input type="hidden" name="eliminar" value="1"><span class="label label-info">Recuperado </span>@endif
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
