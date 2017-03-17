<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';

    protected  $fillable = ['partida','denominacion','id_clasificadorGnralInstituto','tipo','disponiblidad','fecha'];

    public function clasifGnralInst()
    {
        return $this->belongsTo('App\ClasificadorGnralInstituto');
    }
}
