<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    protected $fillable = ['dependencias_id','nombreSeries','codigoSeries','original','copia','soporte','gestion','central','ctfisico','ctelectronico','microfilmacion','digitalizacion','seleccion','eliminacion'];
    protected $dates = ['deleted_at'];
}
