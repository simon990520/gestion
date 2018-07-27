<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependencias extends Model
{
    use SoftDeletes;
    protected $fillable = ['nombreDependencias','codigoDependencias'];
    protected $dates = ['deleted_at'];
}
