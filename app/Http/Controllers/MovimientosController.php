<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasificadorGnralInstituto as CGI;
use App\Http\Controllers\ClasificadorController as CGC;
use App\Movimiento as Movi;
use App\MisHelpers\MisHelpers;

class MovimientosController extends Controller
{
    public static function crearMovimiento($partida, $monto, $clase, $op = true)
    {
        $idPartida = CGI::find($partida);

        $datosPartida = CGC::getPartida($idPartida->id_clasificadorGnral);

        $movi = new Movi();

        $movi->partida = $datosPartida->partida;

        $movi->denominacion = $datosPartida->denominacion;

        $movi->id_clasificadorGnralInstituto = $idPartida->id;

        $movi->tipo = MisHelpers::_claseNombre($clase);

        $monto = MisHelpers::_MonedaMySQL($monto);

        $saldo = CGC::_saldo($idPartida);

        $movi->disponibilidad = static::_calcular($monto,$idPartida->monto_original,$saldo,$op);

        $movi->fecha = date('Y-m-d');

        $movi->save();
    }

    public static function _calcular($monto, $montoOriginal, $saldo, $op = true)
    {
        if ( $op ) {
            return $saldo + $monto;
        }

        return  $saldo - $monto;
    }
}
