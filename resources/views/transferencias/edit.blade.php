@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        .
        <br>
        <form method="post" action="{{action('CentralController@update', $id)}}" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Terminar Transferencia</h3>
                </div>
                <div class="box-body">
                    <input type="hidden" value="{{$data[0]->id}}" name="id">
                    <div class="row">
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="" value="{{$data[0]->nombreSeries}}" disabled>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="" value="{{$data[0]->nombreSubSeries}}" disabled>
                        </div>
                        <div class="col-xs-2">
                            <input type="text" class="form-control" placeholder=".col-xs-5" value="{{$data[0]->codigoSubSeries}}" disabled>
                        </div>
                        <div class="col-xs-2">
                            <button class="btn btn-danger col-md-12" name="update">Guardar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="Estante" name="estante" value="{{$data[0]->estante}}">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="Balda" name="balda" value="{{$data[0]->balda}}">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="Caja" name="caja" value="{{$data[0]->caja}}">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="Carpeta" name="carpeta" value="{{$data[0]->carpeta}}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </form>
    </div>
@endsection
