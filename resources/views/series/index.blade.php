@extends('layouts.admin')

@section('content')
    {{--// denegacion de permisis--}}
    @if($data[0]->nseries == null)
        <div class="container">
            <div class="row">
                <h1 class="text-center">ERROR <p class="bg-red">401</p> PERMISO DENEGADO</h1>
            </div>
        </div>
    @endif
    {{--fin de la denegacion--}}
    <div class="container-fluid">
        @if(count($errors)>0)
            <div class="alert alert-danger animate" role="alert">El nombre de la serie ya existe </div>
            @endif()
        <br>
            @if($data[0]->cseries == '0')
                <form  method="post" action="{{url('series')}}">
                    {{csrf_field()}}
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear nueva serie documental </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <select  class="form-control select2" style="width: 100%;" name="dependencias_id" required>
                                            <option value="0" selected="selected">Dependencia</option>
                                            @foreach($dependencias as $post)
                                            <option value="{{$post['id']}}">{{$post['nombreDependencias']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" name="nombreSeries" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="codigoSeries" class="form-control" placeholder="Codigo" required>
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
                                                <td>Original  <input type="checkbox" class="minimal-red" value="1" name="original"> &nbsp;</td>
                                                <td>Copia <input type="checkbox" class="minimal-red" value="1" name="copia"></td>
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
                                                    <input type="checkbox" class="minimal-red" value="1" name="soporte">
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
                                                <td>Archivo Gestion &nbsp;<input type="number" class="col-xs-12 col-md-12" name="gestion" value="0" required></td>
                                                <td>Archivo Central &nbsp;<input type="number" class="col-xs-12 col-md-12" name="central" value="0" required></td>
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
                                                <td>SF &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctfisico"> </td>
                                                <td>SE &nbsp;<input type="checkbox" class="minimal-red" value="1" name="ctelectronico"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-xs-6">
                                        <table class=" text-center">
                                            <tr>
                                                <td colspan="2">Tecnologia de Conservación</td>
                                            </tr>

                                            <tr>
                                                <td>M &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="microfilmacion">&nbsp;</td>
                                                <td>D &nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="digitalizacion"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-xs-3">
                                        <table class=" text-center">
                                            <tr>
                                                <td>S &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="minimal-red" value="1" name="seleccion">&nbsp;</td>
                                                <td>E &nbsp;&nbsp; <input type="checkbox" class="minimal-red" value="1" name="eliminacion"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        @if($data[0]->nseries == '0')

                        <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
                            <div class="box-header">
                                <h3 class="box-title">Listado de Series</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body col-md-12 col-sm-12 col-xl-12">
                                <table id="example1" class="table table-bordered table-striped col-md-12 col-sm-12 col-xl-12">
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
                                        @if($data[0]->eseries == '0')
                                        <th>Editar</th>
                                        @endif
                                        @if($data[0]->dseries == '0')
                                        <th>Eliminar</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($series as $post)
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
                                            @if($data[0]->eseries == '0')
                                                <td><a href="{{action('SeriesController@edit', $post->id)}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
                                            @endif
                                            @if($data[0]->dseries == '0')
                                                <td><form action="{{action('SeriesController@destroy', $post->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger" type="submit"><i class="fa  fa-trash"></i></button>
                                                    </form></td>
                                            @endif
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
                                        @if($data[0]->eseries == '0')
                                            <th>Editar</th>
                                        @endif
                                        @if($data[0]->dseries == '0')
                                            <th>Eliminar</th>
                                        @endif
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
    </div>
    </div>
@endsection
