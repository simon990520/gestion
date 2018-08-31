<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tranferencias</title>
    <style type="text/css">
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
    </style>
</head>
<body>
<div class="box-body col-md-12">
    <center>
        <h2 style="color: #4e555b">Total de Series</h2>
    </center>
    <div class="datagrid"><table>
            <thead><tr><th>Serie</th><th>Nombre</th><th>Codigo</th><th>Fecha de creación</th></tr></thead>
            <tbody>
            @foreach($data as $post)
                <tr class="alt"><td>{{$post->nombreDependencias}}</td><td>{{$post->nombreSeries}}</td><td>{{$post->codigoSeries}}</td><td>{{$post->created_at}}</td></tr>
            @endforeach
            </tbody>
        </table></div>
</div>
<!-- /.box-body -->
</div>
</div>
</body>
</html>



{{--<table id="example1" class="table table-bordered table-striped " style="width: 100%; border: #000000 1px solid">
    <thead style=" border: #000000 1px solid">
    <tr  style=" border: #000000 1px solid">
        <th style=" border: #000000 1px solid">ID</th>
        <th style=" border: #000000 1px solid">Serie</th>
        <th style=" border: #000000 1px solid">Nombre</th>
        <th style=" border: #000000 1px solid">Codigo</th>

    </tr>
    </thead>
    <tbody style=" border: #000000 1px solid">
    @foreach($data as $post)
        <tr style=" border: #000000 1px solid">
            <td style=" border: #000000 1px solid">{{$post->id}}</td>
            <td style=" border: #000000 1px solid">{{$post->nombreSeries}}</td>
            <td style=" border: #000000 1px solid">{{$post->nombreSubSeries}}</td>
            <td style=" border: #000000 1px solid">{{$post->codigoSubSeries}}</td>
        </tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr style=" border: #000000 1px solid">
        <th style=" border: #000000 1px solid">ID</th>
        <th style=" border: #000000 1px solid">Serie</th>
        <th style=" border: #000000 1px solid">Nombre</th>
        <th style=" border: #000000 1px solid">Codigo</th>

    </tr>
    </tfoot>
</table>--}}

