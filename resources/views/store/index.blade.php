@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form  method="post" action="{{url('store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- /.box-body -->
                    </div>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Cargar archivos</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="col-xs-6">
                        <input name="asunto" type="text" class="form-control" placeholder="Asunto" required>
                    </div>
                    <div class="col-xs-2">
                        <input name="fecha" type="date" class="form-control" placeholder="Fecha"  required>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <input name="radicado" type="text" class="form-control" placeholder="Radicado">
                    </div>
                    <div class="col-xs-8">
                        <input name="unidad" type="text" class="form-control" placeholder="Lugar de consevación" required>
                        <input name="Subserie_id" type="hidden"  value="{{$post->id}}">
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-danger col-xs-12">Guardar</button>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </form>
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-success col-md-12 col-sm-12 col-xl-12">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Documentos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-md-12">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>asunto</th>
                                <th>fecha</th>
                                <th>radicado</th>
                                <th>unidad</th>
                                <th> <small>abrir</small></th>
                                <th><small>Eliminar</small></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->nombre}}</td>
                                    <td>{{$post->asunto}}</td>
                                    <td>{{$post->fecha}}</td>
                                    <td>{{$post->radicado}}</td>
                                    <td>{{$post->unidad}}</td>
                                    <td><a href=" {{action('StoreController@show', $post->id)}}" class="btn btn-primary"> <i class="fa  fa-folder-open"></i></a></td>

                                    <td><form action="{{action('StoreController@destroy', $post->id)}}" method="post">
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
                                <th>Nombre</th>
                                <th>asunto</th>
                                <th>fecha</th>
                                <th>radicado</th>
                                <th>unidad</th>
                                <th> <small>abrir</small></th>
                                <th><small>Eliminar</small></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            {{--<div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="box box-success">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">Archivos</h3>
                        </div>
                        <div class="box-body">
                            <div class="box-footer">
                                <ul class="mailbox-attachments clearfix">
                                    @foreach($data as $post)
                                    <div class="">
                                        <li class="">
                                            <a href="{{asset('pdf/'.$post->file)}}"><span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span></a>

                                            <div class="mailbox-attachment-info">
                                                <a href="{{asset('pdf/'.$post->file)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$post->nombre}}.pdf</a>&nbsp;{{$post->radicado}}
                                                <span class="mailbox-attachment-size">Folio {{$post->consecutivo}} <a href="{{asset('pdf/'.$post->file)}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                                <a href="{{asset('pdf/'.$post->file)}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-trash"></i></a>
                                                <a href="{{asset('pdf/'.$post->file)}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-refresh"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                    </div>
                                        @endforeach
                                </ul>
                            </div>
                        </div>--}}
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
