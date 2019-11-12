<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';

    protected $primaryKey = 'id';

    protected $filliable = ['codigo_contrato', 'tipo_contrato', 'fecha_alta', 'fecha_baja', 'motivo_baja', 'trabajador_id', 'centro_id', 'cargo_id'];

    protected $guarded = ['id'];

    public function trabajador()
    {
        return $this->belongsTo('App\Trabajadores');
    }

    public function centro()
    {
        return $this->belongsTo('App\Centro');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }
}
