@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <br>
        <form  method="post" action="{{url('sub-series')}}">
            {{csrf_field()}}
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear nueva Sub-serie documental </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <select  class="form-control select2" style="width: 100%;" name="serie_id" required>
                                    <option value="0" selected="selected">seleccione Serie</option>
                                    @foreach($series as $post)
                                        <option value="{{$post->id}}">{{$post->nombreSeries}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" name="nombreSubSeries" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="codigoSubSeries" class="form-control" placeholder="Codigo" required>
                        </div>
                        <div class="col-xs-2">
                            <button name="enviar" class="btn btn-danger">Guardar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <p class="col-xs-12">Tradición Documental</p>
                            <div class="col-xs-7">
                                <table class="">
                                    <tr>
                                        <td colspan="2">Soporte Físico</td>
                                    </tr>

                                    <tr>
                                        <td>Original  <input type="checkbox" class="minimal-red" value="1" name="originalSubSeries"> &nbsp;</td>
                                        <td>Copia <input type="checkbox" class="minimal-red" value="1" name="copiaSubSeries"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-5">
                                <table class="">
                                    <tr>
                                        <td colspan="2">Soporte Electrónico</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="minimal-red" value="1" name="soporteSubSeries">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <p>Retención (años)</p>
                            <div class="col-xs-6">
                                <table class="">
                                    <tr>
                                        <td>Archivo Gestion &nbsp;<input type="number" class="col-xs-12 col-md-12" name="gestionSubSeries" value="0" required></td>
                                        <td>Archivo Central &nbsp;<input type="number" class="col-xs-12 col-md-12" name="centralSubSeries" value="0" required></td>
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
                                        <td>SF &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctfisicoSubSeries"> </td>
                                        <td>SE &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctelectronicoSubSeries"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-6">
                                <table class=" text-center">
                                    <tr>
                                        <td colspan="2">Tecnologia de Conservación</td>
                                    </tr>

                                    <tr>
                                        <td>M &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="microfilmacionSubSeries">&nbsp;</td>
                                        <td>D &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="digitalizacionSubSeries"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-3">
                                <table class=" text-center">
                                    <tr>
                                        <td>S &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="seleccionSubSeries">&nbsp;</td>
                                        <td>E &nbsp;&nbsp; <input type="checkbox" class="minimal-red" value="1" name="eliminacionSubSeries"></td>
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
                <h3 class="box-title">Listado de Sub-series</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body col-md-12">
                <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Serie</th>
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
                        <th>Abrir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_series as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->nombreSubSeries}}</td>
                            <td>{{$post->codigoSubSeries}}</td>
                            <td> @if($post->originalSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->copiaSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->soporteSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>{{$post->gestionSubSeries}}</td>
                            <td>{{$post->centralSubSeries}}</td>
                            <td>@if($post->ctfisicoSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->ctelectronicoSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->microfilmacionSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->digitalizacionSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->seleccionSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td>@if($post->eliminacionSubSeries==1)<span class="label label-success"><i class="fa fa-check"></i></span>@else<span class="label label-danger"><i class="fa fa-ban"></i></span>@endif</td>
                            <td><a href="{{action('SubSeriesController@edit', $post->id)}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
                            <td><form action="{{action('SubSeriesController@destroy', $post->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class="fa  fa-trash"></i></button>
                                </form></td>
                            <td><a href="{{action('SubSeriesController@show', $post->id)}}" class="btn btn-primary"> <i class="fa  fa-folder-open"></i></a></td>
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
                        <th>Abrir</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
