<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    protected $table = 'institutos';

    protected $fillable = ['nombre','sector','programa','sub_programa','proyecto','actividad','o','direccion','responsable','final'];

    public function usuarios(){
        return $this->hasMany('App\User');
    }

    public function clasificadorGnral_institutos(){
        return $this->hasMany('ClasificadorGnralInstituto');
    }
}
