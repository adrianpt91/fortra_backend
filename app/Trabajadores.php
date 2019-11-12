<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    protected $fillable = ['ci', 'first_name', 'last_name', 'municipio', 'provincia', 'adress', 'sexo', 'militancia', 'ec'];

    public function contrato()
    {
        return $this->hasOne('App\Contrato');
    }
}
