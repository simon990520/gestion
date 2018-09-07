<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Central extends Model
{
    protected $fillable = ['serie_id','nombreSubSeries','codigoSubSeries','originalSubSeries','copiaSubSeries','soporteSubSeries','gestionSubSeries','centralSubSeries','ctfisicoSubSeries','ctelectronicoSubSeries','microfilmacionSubSeries','digitalizacionSubSeries','seleccionSubSeries','eliminacionSubSeries','estante','balda','caja','carpeta'];

}
