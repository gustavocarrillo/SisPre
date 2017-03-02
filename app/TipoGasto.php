<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGasto extends Model
{
    protected $table = 'tipo_gasto';

    protected $fillable = ['tipo_gasto'];

    public function clasificadorGnral_Institutos(){
        return $this->hasMany('App\ClasificadorGnralInstituto');
    }
}
