<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasificadorGnralInstituto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Compromiso;
use App\MisHelpers\MisHelpers;
use App\Http\Controllers\ClasificadorController as CGC;
use App\Http\Controllers\MovimientosController as MoviC;
use App\CatalogoOperacion as Op;

class CompromisosController extends Controller
{

    public function nuevo()
    {
        $clasif = DB::table('clasificadorgnral_instituto')
            ->join('clasificador_general','clasificadorgnral_instituto.id_clasificadorGnral','=','clasificador_general.id')
            ->where('clasificadorgnral_instituto.id_instituto','=',Auth::user()->id_instituto)
            ->select('clasificador_general.partida as partida','clasificadorgnral_instituto.id as id')
            ->get();

        $ops = Op::all();

        return view('compromisos.nuevo')
            ->with('clasif',$clasif)
            ->with('ops',$ops);
    }

    public function guardado(Request $request)
    {
        $compromiso = new Compromiso();

        $compromiso->numero = $request->numero;

        $compromiso->tipo = $request->tipo;

        $compromiso->monto = MisHelpers::_MonedaMySQL($request->monto);

        $compromiso->fecha = MisHelpers::_FechaMySQL($request->fecha);

        $compromiso->id_clasificadorGnral_instituto = $request->partida;

        $compromiso->creado_por= MisHelpers::_UserID();

        $compromiso->save();

        MoviC::crearMovimiento($request->partida,$request->monto,$request->tipo,false);

        return redirect()->route('compromisos-verTodos');
    }

    public function verTodos()
    {
        $compromisos = DB::table('compromisos')
            ->join('clasificadorgnral_instituto','clasificadorgnral_instituto.id','=','compromisos.id_clasificadorGnral_instituto')
            ->join('clasificador_general','clasificador_general.id','=','clasificadorgnral_instituto.id_clasificadorGnral')
            ->where('clasificadorgnral_instituto.id_instituto','=',Auth::user()->id_instituto)
            ->select('compromisos.id as id',
                'compromisos.numero as numero',
                'compromisos.anulada as anulada',
                'compromisos.monto as monto',
                'compromisos.fecha as fecha',
                'compromisos.tipo as tipo',
                'clasificador_general.partida as partida')
            ->get();

        return view('compromisos.verTodos')->with('compromisos',$compromisos);
    }

    public function getDenominacion(Request $request)
    {
        return CGC::getDenominacion($request->partida);
    }

}
