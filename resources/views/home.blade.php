@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-md-offset-0 bg-page">
    <br>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$dependencias }}</h3>

                    <p>Dependencias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>
                <a href="{{ url('dependencias') }}" class="small-box-footer">
                    More info <i class="fa fa-tags"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$series}}<sup style="font-size: 20px"></sup></h3>

                    <p>Series</p>
                </div>
                <div class="icon">
                    <i class="fa fa-laptop"></i>
                </div>
                <a href="{{ url('series') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$Subseries}}</h3>

                    <p>Sub series</p>
                </div>
                <div class="icon">
                    <i class="fa fa-edit"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    {{--//timeline--}}


    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Linea de tiempo
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">
                        <!-- timeline time label -->
                        @foreach($timeline as $post)
                        <li class="time-label">
                            @if($post->action == 'create')<span class="bg-blue">@endif
                            @if($post->action == 'update')<span class="bg-orange">@endif
                            @if($post->action == 'delete')<span class="bg-red">@endif
                            @if($post->action == 'recover')<span class="bg-green">@endif
                    {{$post->created_at}}
                  </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            @if($post->action == 'create')<i class="fa fa-envelope bg-blue"></i>@endif
                            @if($post->action == 'update')<i class="fa fa-refresh bg-orange"></i>@endif
                            @if($post->action == 'delete')<i class="fa fa-trash bg-red"></i>@endif
                            @if($post->action == 'recover')<i class="fa fa-recycle bg-green"></i>@endif
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                @if($post->action == 'create')<h3 class="timeline-header"><a href="#">{{$post->name}}</a> Creo la siguiente {{$post->tabla}}</h3>@endif
                                @if($post->action == 'update')<h3 class="timeline-header"><a href="#">{{$post->name}}</a> Actualizo la siguiente {{$post->tabla}}</h3>@endif
                                @if($post->action == 'delete')<h3 class="timeline-header"><a href="#">{{$post->name}}</a> Elimino la siguiente {{$post->tabla}}</h3>@endif
                                @if($post->action == 'recover')<h3 class="timeline-header"><a href="#">{{$post->name}}</a> Recupero la siguiente {{$post->tabla}}</h3>@endif

                                <div class="timeline-body">
                                    {{$post->nombre}}:&nbsp;{{$post->codigo}}&nbsp;En la fecha: {{$post->created_at}}
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Bitacora</a>
                                    <a class="btn btn-danger btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
