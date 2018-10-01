@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if($data[0]->transferir == '0')
        <div class="box box-success col-md-12 col-sm-12 col-xl-12">
            <div class="box-header">
                <h3 class="box-title">Listado de SubSeries Tranferidas</h3>
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
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>

                        <th>Transferir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_series as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->nombreSubSeries}}</td>
                            <td>{{$post->codigoSubSeries}}</td>
                            <td>{{$post->gestionSubSeries}}</td>
                            <td>{{$post->centralSubSeries}}</td>
                            @if($post->estado == '3')
                                <td><span class="label label-success">Transferido</span></td>

                            @else()
                                <td>
                                    <form  method="POST" action="{{action('StoreController@update', $post->id)}}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <button class="btn btn-danger btn-sm">Transferir</button>
                                    </form>
                                </td>
                            @endif()
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Dependencia</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th> <small>Archivo gestión</small></th>
                        <th><small>Archivo central</small></th>

                        <th>Transferir</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        @endif

        {{--recivir--}}


    </div>
    .
    <br>

    <div class="container">
        @if($data[0]->recivir == '0')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-success ">
                    <div class="box-header">
                        <i class="fa fa-address-book-o"></i>

                        <h3 class="box-title">Listado de Subseries a recibir</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">
                            @foreach($recibir as $post)
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <span class="text">Solicitud de transferir la subserie <strong>{{$post->nombreSubSeries}}</strong> para archivo central</span>
                                        </div>
                                        <div class="col-md-2">
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> {{$post->updated_at}}</small>
                                        </div>
                                        <a href="{{action('CentralController@show', $post->id)}}"><button class="btn btn-success btn-sm col-md-1" name="recibir">Recibir</button> </a>
                                        <form  method="post" action="{{action('CentralController@update', $post->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <button class="btn btn-danger btn-sm col-md-1" name="devolver">Devolver</button>
                                        </form>
                                        <div class="tools">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
            @endif
    </div>
    @if($data[0]->ver == '0')
    <div class="row">
        <div class="box box-warning col-md-12 col-sm-12 col-xl-12">
            <div class="box-header">
                <h3 class="box-title">Listado de SubSeries en archivo central</h3>
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
                        <th> Estante</th>
                        <th> Balda</th>
                        <th> Caja</th>
                        <th> Carpeta</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                        <th>Abrir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($central as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->nombreSeries}}</td>
                            <td>{{$post->nombreSubSeries}}</td>
                            <td>{{$post->codigoSubSeries}}</td>
                            <td>{{$post->estante}}</td>
                            <td>{{$post->balda}}</td>
                            <td>{{$post->caja}}</td>
                            <td>{{$post->carpeta}}</td>
                                <td><form action="{{action('CentralController@destroy', $post->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"><i class="fa  fa-trash"></i></button>
                                    </form></td>
                            <td><a href="{{action('CentralController@edit', $post->id)}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
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
                        <th> Estante</th>
                        <th> Balda</th>
                        <th> Caja</th>
                        <th> Carpeta</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                        <th>Abrir</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    @endif
    <!-- /.box -->
@endsection
