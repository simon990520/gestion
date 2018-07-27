@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <br>
        <form  method="post" action="{{action('SeriesController@update', $id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear nueva serie documental </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <select  class="form-control select2" style="width: 100%;" name="dependencias_id" required>
                                    @foreach($series as $post)
                                        <option value="{{$post->depeid}}">{{$post->nombreDependencias}}</option>
                                    @endforeach
                                    @foreach($dependencias as $depen)
                                        <option value="{{$depen['id']}}">{{$depen['nombreDependencias']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" name="nombreSeries" class="form-control" placeholder="Nombre" required value="@foreach($series as $post){{$post->nombreSeries}}@endforeach">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="codigoSeries" class="form-control" placeholder="Codigo" required value="@foreach($series as $post){{$post->codigoSeries}}@endforeach">
                        </div>
                        <div class="col-xs-2">
                            <button name="enviar" class="btn btn-danger">Actualizar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <p class="col-xs-12">Tradición Documental</p>
                            <div class="col-xs-6">
                                <table class="">
                                    <tr>
                                        <td colspan="2">Soporte Físico</td>
                                    </tr>

                                    <tr>
                                        <td>Original  <input type="checkbox" class="minimal-red" value="1" name="original" @if( $series[0]->original ==1) checked @else @endif>&nbsp;</td>
                                        <td>Copia <input type="checkbox" class="minimal-red" value="1" name="copia"@if( $series[0]->copia ==1) checked @else @endif></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-6">
                                <table class="">
                                    <tr>
                                        <td colspan="2">Soporte Electrónico</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="minimal-red" value="1" name="soporte"@if( $series[0]->soporte ==1) checked @else @endif>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <p>Retención (años)</p>
                            <div class="col-xs-6">
                                <table class="">
                                    <tr>
                                        <td>Archivo Gestion &nbsp;<input type="number" class="col-xs-12 col-md-12" name="gestion" value="{{$series[0]->gestion}}"></td>
                                        <td>Archivo Central &nbsp;<input type="number" class="col-xs-12 col-md-12" name="central" value="{{$series[0]->central}}"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <p>Disposición Final</p>
                            <div class="col-xs-3">
                                <table class=" text-center">
                                    <tr>
                                        <td colspan="2">CT</td>
                                    </tr>

                                    <tr>
                                        <td>SF &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctfisico" @if( $series[0]->ctfisico ==1) checked @else @endif> </td>
                                        <td>SE &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctelectronico" @if( $series[0]->ctelectronico ==1) checked @else @endif></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-6">
                                <table class=" text-center">
                                    <tr>
                                        <td colspan="2">Tecnologia de Conservación</td>
                                    </tr>

                                    <tr>
                                        <td>M &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="microfilmacion"@if( $series[0]->microfilmacion ==1) checked @else @endif>&nbsp;</td>
                                        <td>D &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="digitalizacion"@if( $series[0]->digitalizacion ==1) checked @else @endif></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-3">
                                <table class=" text-center">
                                    <tr>
                                        <td>S &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="seleccion"@if( $series[0]->seleccion ==1) checked @else @endif>&nbsp;</td>
                                        <td>E &nbsp;&nbsp; <input type="checkbox" class="minimal-red" value="1" name="eliminacion"@if( $series[0]->eliminacion ==1) checked @else @endif></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
            <div class="box-header">
                <h3 class="box-title">Listado de dependencias</h3>
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
                        <th>Original</th>
                        <th>Copia</th>
                        <th> <small> Soporte electronico</small></th>
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>
                        <th>SF</th>
                        <th>SE</th>
                        <th>M</th>
                        <th>D</th>
                        <th>S</th>
                        <th>E</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seriess as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreDependencias}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->codigoSeries}}</td>
                            <td> @if($post->original==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->copia==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->soporte==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>{{$post->gestion}}</td>
                            <td>{{$post->central}}</td>
                            <td>@if($post->ctfisico==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->ctelectronico==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->microfilmacion==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->digitalizacion==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->seleccion==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->eliminacion==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td><a href="{{action('SeriesController@edit', $post->id)}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
                            <td><form action="{{action('SeriesController@destroy', $post->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class="fa  fa-trash"></i></button>
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Dependencia</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Original</th>
                        <th>Copia</th>
                        <th> <small> Soporte electronico</small></th>
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>
                        <th>SF</th>
                        <th>SE</th>
                        <th>M</th>
                        <th>D</th>
                        <th>S</th>
                        <th>E</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
