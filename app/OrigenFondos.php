<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrigenFondos extends Model
{
    protected $table = 'origen_fondos';

    protected $fillable = ['nombre'];

    public function clasificadorGnral_Institutos(){
        return $this->hasMany('App\ClasificadorGnralInstituto');
    }
}
