<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bitacora_series extends Model
{
    use SoftDeletes;
    protected $fillable = ['serie_id','dependencias_id','nombreSeries','codigoSeries','original','copia','soporte','gestion','central','ctfisico','ctelectronico','microfilmacion','digitalizacion','seleccion','eliminacion','action','users_id'];
    protected $dates = ['deleted_at'];
}
