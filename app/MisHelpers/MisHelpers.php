<?php

namespace App\MisHelpers;

use Illuminate\Support\Facades\Auth;
use App\Instituto as Inst;

class MisHelpers
{
    public static function _MonedaMySQL($num)
    {
        //Se debe descomentar el modulo Intl en php.ini para que funcione
        //formatea el monto original a formato entendido por MySQL
        $_parse = numfmt_create('es_ES',\NumberFormatter::DECIMAL);

        $_result = numfmt_parse($_parse,$num);

        return $_result;
    }

    public static function _FechaMySQL($fecha)
    {
        $fecha = date('Y-m-d', strtotime($fecha));

        return $fecha;
    }

    public static function _UserID()
    {
        return Auth::user()->id;
    }

    public static function _Instituto()
    {
        $inst = Inst::find(Auth::user()->id_instituto);

        return $inst->nombre;
    }

    public static function _Moneda($num)
    {
        return number_format($num,2,',','.');
    }

    public static function _claseNombre($class)
    {
        $className = str_replace('App\Http\Controllers\\','',get_class($class));

        $className = str_replace('sController','',$className);

        return strtolower($className);
    }
}

