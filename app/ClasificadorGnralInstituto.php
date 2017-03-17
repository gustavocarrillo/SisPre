<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasificadorGnralInstituto extends Model
{
    protected $table = 'clasificadorgnral_instituto';

    protected $fillable = ['id_instituto','id_clasificadorGnral','monto_original','ano_presupuesto','fecha_creacion','partida_alterna','id_tipoGasto','id_origenFondos'];

    public function clasificadorGnral()
    {
        return $this->belongsTo('App\ClasificadorGnral');
    }

    public function instituto()
    {
        return $this->belongsTo('App\Instituto');
    }

    public function tipoGasto()
    {
        return $this->belongsTo('App\TipoGasto');
    }

    public function origenFondos()
    {
        return $this->belongsTo('App\OrigenFondos');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Movimiento');
    }

}
