@extends('layouts.admin')

@section('content')
    @if($permisos[0]->eusuarios  == '0')
    @else
        <div class="container">
            <div class="row">
                <h1 class="text-center">ERROR <p class="bg-red">401</p> PERMISO DENEGADO</h1>
            </div>
        </div>
    @endif
    {{--@if($permisos[0]->eusuarios  == '0')--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">.</div>
            @if($permisos[0]->nusuarios  == '0')
            <form method="post" action="{{action('UserController@update', $datos[0]->id)}}">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo usuario</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$datos[0]->name}}" required autofocus placeholder="Nombre">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-xs-3">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$datos[0]->email}}" required placeholder="Correo">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-xs-3">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-xs-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repita contraseña">
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Permisos</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <h4>Dependencias</h4>
                                        <label>
                                            <input name="ndependencias" type="checkbox" class="flat-red" value="0" @if($datos[0]->ndependencias != '0')@else checked @endif> Navegar por las dependencias
                                        </label>
                                        <label>
                                            <input name="cdependencias" type="checkbox" class="flat-red" value="0" @if($datos[0]->cdependencias != '0')@else checked @endif> Crear dependencias
                                        </label>
                                        <label>
                                            <input name="edependencias" type="checkbox" class="flat-red" value="0" @if($datos[0]->edependencias != '0')@else checked @endif> Editar  dependencias
                                        </label>
                                        <label>
                                            <input name="ddependencias" type="checkbox" class="flat-red" value="0" @if($datos[0]->ddependencias != '0')@else checked @endif> Eliminar dependencias
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4>Series</h4>
                                        <label>
                                            <input name="nseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->nseries != '0')@else checked @endif>Navegar por las Series
                                        </label>
                                        <label>
                                            <input name="cseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->cseries != '0')@else checked @endif>Permiso para crear Series
                                        </label>
                                        <label>
                                            <input name="eseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->eseries != '0')@else checked @endif>Permiso para Editar  Series
                                        </label>
                                        <label>
                                            <input name="dseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->dseries != '0')@else checked @endif>Permiso para Eliminar Series
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4>Subseries</h4>
                                        <label>
                                            <input name="nsubseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->nsubseries != '0')@else checked @endif> Navegar por las Subseries
                                        </label>
                                        <label>
                                            <input name="csubseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->csubseries != '0')@else checked @endif>Permiso para Crear Subseries
                                        </label>
                                        <label>
                                            <input name="esubseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->esubseries != '0')@else checked @endif>Permiso para Editar  Subseries
                                        </label>
                                        <label>
                                            <input name="dsubseries" type="checkbox" class="flat-red" value="0" @if($datos[0]->dsubseries != '0')@else checked @endif>Permiso para Eliminar Subseries
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4>Ususarios</h4>
                                        <label>
                                            <input  name="nusuarios" type="checkbox" class="flat-red" value="0" @if($datos[0]->nusuarios != '0')@else checked @endif> Navegar por los Usuarios
                                        </label>
                                        <label>
                                            <input  name="cusuarios" type="checkbox" class="flat-red" value="0" @if($datos[0]->cusuarios != '0')@else checked @endif>Permiso para Crear Usuarios
                                        </label>
                                        <label>
                                            <input  name="eusuarios" type="checkbox" class="flat-red" value="0" @if($datos[0]->eusuarios != '0')@else checked @endif>Permiso para Editar  Usuarios
                                        </label>
                                        <label>
                                            <input  name="dusuarios" type="checkbox" class="flat-red" value="0" @if($datos[0]->dusuarios != '0')@else checked @endif>Permiso para Eliminar Usuarios
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-success  col-md-8 col-md-offset-2">Guardar</button>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </form>
            @endif
            @if($permisos[0]->nusuarios  == '0')
            <div class="box box-danger col-md-12 col-sm-12 col-xl-12">
                <div class="box-header">
                    <h3 class="box-title">Listado de Series</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body col-md-12">
                    <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Dependencias</th>
                            <th>Series</th>
                            <th>Subseries</th>
                            <th>Ususarios</th>
                            @if($permisos[0]->eusuarios  == '0')
                            <th>Editar</th>
                            @endif
                            @if($permisos[0]->dusuarios  == '0')
                            <th>Eliminar</th>
                                @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>@if($data->ndependencias != '0')<span class="label label-danger"><i class="fa fa-ban"></i></span>@else <span class="label label-success"><i class="fa fa-check"></i></span> @endif</td>
                                <td>@if($data->nseries != '0')<span class="label label-danger"><i class="fa fa-ban"></i></span>@else <span class="label label-success"><i class="fa fa-check"></i></span> @endif</td>
                                <td>@if($data->nsubseries != '0')<span class="label label-danger"><i class="fa fa-ban"></i></span>@else <span class="label label-success"><i class="fa fa-check"></i></span> @endif</td>
                                <td>@if($data->nusuarios  != '0')<span class="label label-danger"><i class="fa fa-ban"></i></span>@else <span class="label label-success"><i class="fa fa-check"></i></span> @endif</td>
                                @if($permisos[0]->eusuarios  == '0')
                                <td><a href="{{action('UserController@edit', $data->id)}}" class="btn btn-warning"> <i class="fa  fa-refresh"></i></a></td>
                                @endif
                                @if($permisos[0]->dusuarios  == '0')
                                <td><form action="{{action('UserController@destroy', $data->id)}}" method="post">
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
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Dependencias</th>
                            <th>Series</th>
                            <th>Subseries</th>
                            <th>Ususarios</th>
                            @if($permisos[0]->eusuarios  == '0')
                                <th>Editar</th>
                            @endif
                            @if($permisos[0]->dusuarios  == '0')
                                <th>Eliminar</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
   {{-- @endif--}}
@endsection
