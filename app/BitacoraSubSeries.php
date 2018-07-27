<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BitacoraSubSeries extends Model
{
    use SoftDeletes;
    protected $fillable = ['Subserie_id','serie_id','nombreSubSeries','codigoSubSeries','originalSubSeries','copiaSubSeries','soporteSubSeries','gestionSubSeries','centralSubSeries','ctfisicoSubSeries','ctelectronicoSubSeries','microfilmacionSubSeries','digitalizacionSubSeries','seleccionSubSeries','eliminacionSubSeries','action','users_id'];
    protected $dates = ['deleted_at'];
}
