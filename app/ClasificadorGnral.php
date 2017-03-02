<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasificadorGnral extends Model
{
    protected $table = 'clasificador_general';

    protected $fillable =['partida','denominacion'];

    public function clasicadorGnral_institutos(){
        return $this->hasMany('App\ClasificadorGnralInstituto');
    }
}
