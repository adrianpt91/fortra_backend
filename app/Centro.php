<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';

    protected $primaryKey = 'id';

    protected $filliable = ['codigo', 'nombre_centro'];

    protected $guarded = ['id'];

    public function subcentros()
    {
        return $this->hasMany('App\Subcentro');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }
}
