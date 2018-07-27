<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['nombre','asunto','consecutivo','fecha','radicado','unidad','file','Subserie_id'];
}
