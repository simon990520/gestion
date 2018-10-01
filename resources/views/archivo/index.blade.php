@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center bg-green">{{$title->asunto}}</h2>
        .
        <br>
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-danger">
                <div class="box-header with-border">
                    <center><h3 class="box-title ">Cargar archivos</h3></center>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-primary col-md-12" onclick="scanToPdfWithThumbnails();">Escanear</button>
                    <div class="col-md-12" id="images"></div>
                    <form id="form1" action="{{asset('upload.php')}}" method="POST" enctype="multipart/form-data" target="_blank" >
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="button" value="Guardar" class="btn btn-success col-md-12" onclick="submitFormWithScannedImages();">
                    </form>
                    <br>
                    <div id="server_response" class="text-center text-black"></div>
                </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <center><h3 class="box-title ">Archivos</h3></center>
                    </div>
                    <div class="box-body bg">
                        @foreach($archivos as $post)
                        <li class="col-md-3">
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="{{asset('tmp/'.$post->ruta)}}.pdf" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$post->ruta}}.pdf</a>
                                <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="{{asset('tmp/'.$post->ruta)}}.pdf" download="{{$post->ruta}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                            </div>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
