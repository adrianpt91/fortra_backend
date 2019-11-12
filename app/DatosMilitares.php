<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosMilitares extends Model
{
    protected $fillable = ['nombre_centro', 'fecha_alta'];
}
