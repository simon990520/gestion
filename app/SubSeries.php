<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubSeries extends Model
{
    use SoftDeletes;
    protected $fillable = ['serie_id','nombreSubSeries','codigoSubSeries','originalSubSeries','copiaSubSeries','soporteSubSeries','gestionSubSeries','centralSubSeries','ctfisicoSubSeries','ctelectronicoSubSeries','microfilmacionSubSeries','digitalizacionSubSeries','seleccionSubSeries','eliminacionSubSeries','estado'];
    protected $dates = ['deleted_at'];
}
