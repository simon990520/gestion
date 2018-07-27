<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = ['tabla','nombre','codigo','action','users_id'];
}
