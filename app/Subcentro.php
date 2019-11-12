<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcentro extends Model
{
    protected $table = 'subcentro';

    protected $primaryKey = 'id';

    protected $filliable = [
        'centro_id', 
        'codigo_sub', 
        'nombre_subcentro'
        ];

    protected $guarded = ['id'];

    public function centro()
    {
        return $this->belongsTo('App\Centro');
    }
}
