<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['nombre_cargo'];

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }
}
