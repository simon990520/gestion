@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">.</div>
        <div class="row">
            <div class="col-md-12">
                @if($data[0]->edependencias == '0')
                <form method="post" action="{{action('DependenciasController@update', $id)}}">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar nueva dependencia </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nombreDependencias" class="form-control" placeholder="Nombre" value="{{$did->nombreDependencias}}" required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="codigoDependencias" class="form-control" placeholder="Codigo" value="{{$did->codigoDependencias}}" required>
                                </div>
                                <div class="col-xs-2">
                                    <button name="enviar" class="btn btn-danger">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                @endif
                @if($data[0]->ndependencias == '0')
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Listado de dependencias</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Fecha de inserción </th>
                                <th>Fecha de actualización   </th>
                                @if($data[0]->edependencias == '0')
                                    <th>Editar</th>
                                @else
                                @endif
                                @if($data[0]->ddependencias == '0')
                                    <th>Eliminar</th>
                                @else
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dependencias as $post)
                                <tr>
                                    <td>{{$post['id']}}</td>
                                    <td>{{$post['nombreDependencias']}}</td>
                                    <td>{{$post['codigoDependencias']}}</td>
                                    <td>{{$post['created_at']}}</td>
                                    <td>{{$post['updated_at']}}</td>
                                    @if($data[0]->edependencias == '0')
                                    <td><a href="{{action('DependenciasController@edit', $post['id'])}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
                                    @else
                                    @endif
                                    @if($data[0]->ddependencias == '0')
                                        <td><form action="{{action('DependenciasController@destroy', $post['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit"><i class="fa  fa-trash"></i></button>
                                        </form></td>
                                    @else
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Fecha de inserción </th>
                                <th>Fecha de actualización   </th>
                                @if($data[0]->edependencias == '0')
                                    <th>Editar</th>
                                @else
                                @endif
                                @if($data[0]->ddependencias == '0')
                                    <th>Eliminar</th>
                                @else
                                @endif
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @else
        @endif
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
