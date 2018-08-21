@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">.</div>
        <div class="row col-md-12 col-sm-12 col-xl-12">
            <div class="col-md-12 col-sm-12 col-xl-12">

                <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
                    <div class="box-header">
                        <h3 class="box-title">Listado de SubSeries</h3>
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
                                    <form method="post" action="{{action('BitacoraSubController@update', $post->Subserie_id)}}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="Subserie_id" type="hidden" value="{{$post->Subserie_id}}">
                                        <input name="serie_id" type="hidden" value="{{$post->serie_id}}">
                                        <input name="nombreSubSeries" type="hidden" value="{{$post->nombreSubSeries}}">
                                        <input name="codigoSubSeries" type="hidden" value="{{$post->codigoSubSeries}}">
                                        <input name="originalSubSeries" type="hidden" value="{{$post->originalSubSeries}}">
                                        <input name="copiaSubSeries" type="hidden" value="{{$post->copiaSubSeries}}">
                                        <input name="soporteSubSeries" type="hidden" value="{{$post->soporteSubSeries}}">
                                        <input name="gestionSubSeries" type="hidden" value="{{$post->gestionSubSeries}}">
                                        <input name="centralSubSeries" type="hidden" value="{{$post->centralSubSeries}}">
                                        <input name="ctfisicoSubSeries" type="hidden" value="{{$post->ctfisicoSubSeries}}">
                                        <input name="ctelectronicoSubSeries" type="hidden" value="{{$post->ctelectronicoSubSeries}}">
                                        <input name="microfilmacionSubSeries" type="hidden" value="{{$post->microfilmacionSubSeries}}">
                                        <input name="digitalizacionSubSeries" type="hidden" value="{{$post->digitalizacionSubSeries}}">
                                        <input name="seleccionSubSeries" type="hidden" value="{{$post->seleccionSubSeries}}">
                                        <input name="eliminacionSubSeries" type="hidden" value="{{$post->eliminacionSubSeries}}">
                                        <input name="action" type="hidden" value="{{$post->action}}">
                                        <td>{{$post->Subserie_id}}</td>
                                        <td>{{$post->nombreSubSeries}}</td>
                                        <td>{{$post->codigoSubSeries}}</td>
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
