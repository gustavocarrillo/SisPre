<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoModificacion extends Model
{
    protected $table = 'catalogo_modificaciones';

    protected $fillable = ['nombre','tipo'];
}
