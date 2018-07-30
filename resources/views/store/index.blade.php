@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form  method="post" action="{{url('store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Cargar archivos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-xs-4">
                            <input name="asunto" type="text" class="form-control" placeholder="Asunto" required>
                        </div>
                        <div class="col-xs-2">
                            <div  class="form-control "  >@if(isset($last)){{$last->consecutivo+1}} @else 1 @endif</div>
                            <input name="consecutivo" type="hidden" class="form-control " placeholder="Folio" value="@if(isset($last)){{$last->consecutivo+1}} @else 1 @endif">
                        </div>
                        <div class="col-xs-2">
                            <input name="fecha" type="date" class="form-control" placeholder="Fecha" required>
                        </div>
                        <div class="col-xs-2">
                            <input name="radicado" type="text" class="form-control" placeholder="Radicado">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-8">
                            <input name="unidad" type="text" class="form-control" placeholder="Lugar de consevación" required>
                            <input name="Subserie_id" type="hidden"  value="{{$post->id}}">
                        </div>
                        <div class="col-xs-2">
                            <label class="btn btn-success btn-file col-xs-12">
                                Seleccione archivo <input name="file" type="file" style="display: none;" required>
                            </label>
                        </div>
                        <div class="col-xs-2">
                            <button class="btn btn-danger col-xs-12">Guardar</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </form>
            <div class="row">
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
                                                <a href="{{asset('pdf/'.$post->file)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$post->nombre}}.pdf</a>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
