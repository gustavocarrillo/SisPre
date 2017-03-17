<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoOperacion extends Model
{
    protected $table = 'catalogo_operaciones';

    protected $fillable = ['nombre'];

    public function movimientos()
    {
        return $this->hasMany('App\Movimiento');
    }
}
