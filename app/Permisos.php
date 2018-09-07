<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $fillable = ['ndependencias','cdependencias','edependencias','ddependencias','nseries','cseries','eseries','dseries','nsubseries','csubseries','esubseries','dsubseries','nusuarios','cusuarios','eusuarios','dusuarios','transferir','recivir','ver','user_id'];
}
