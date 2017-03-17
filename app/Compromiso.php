<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compromiso extends Model
{
    protected $table = 'compromisos';

    protected $fillable = ['num_compromiso','tipo','monto','fecha','anulada','fecha_anulacion','id_clasificadorGnral_instituto','creado_por'];

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

}


