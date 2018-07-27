<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BitacoraDependencias extends Model
{
    use SoftDeletes;
    protected $fillable = ['bitacoraDependencias_id','nombreDependencias','codigoDependencias','action','users_id'];
    protected $dates = ['deleted_at'];
}
