<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['nombre','asunto','fecha','radicado','unidad','Subserie_id'];
}
