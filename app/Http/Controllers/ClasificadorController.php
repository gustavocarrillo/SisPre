<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasificadorGnralInstituto as CGI;
use App\ClasificadorGnral as CG;
use App\Movimiento as Movi;
use App\MisHelpers\MisHelpers;

class ClasificadorController extends Controller
{
    public function nuevo()
    {
        return view('clasificador.nuevo');
    }

    public function guardado(Request $request)
    {
        $this->validate($request,[
            'partida' => 'required|min:13|max:13',
            'denominacion' => 'required|min:4'
        ]);

        $cg = new CG();

        $cg->partida = $request->partida;

        $cg->denominacion = $request->denominacion;

        $cg->save();

        flash('Elemento creado exitosamente','success');

        return redirect()->route('clasifGnral-nuevo');
    }

    public function verTodos()
    {
        $cg = CG::all();

        return view('clasificador.verTodos')->with('clasifGnral',$cg);
    }

    public function editar($id)
    {
        $cg = CG::find($id);

        return view('clasificador.editar')->with('clasifGnral',$cg);
    }

    public function editado(Request $request)
    {
        $this->validate($request,[
            'partida' => 'required|min:13|max:13',
            'denominacion' => 'required|min:4'
        ]);

        $cg = CG::find($request->id);

        $cg->partida = $request->partida;

        $cg->denominacion = $request->denominacion;

        $cg->save();

        flash('Elemento modificado exitosamente','success');

        return redirect()->route('clasifGnral-ver');
    }

    public function eliminar($id)
    {
        $cg = CG::find($id);

        $cg->delete();

        flash('El elemento ha sido eliminado','success');

        return redirect()->route('clasifGnral-ver');
    }

    public static function getDenominacion($partida)
    {
        $cgi = CGI::find($partida);

        $cg = CG::find($cgi->id_clasificadorGnral);

        $saldo = static::_saldo($cgi);

        $saldo = MisHelpers::_Moneda($saldo);

        return response()->json(['denominacion' => $cg->denominacion,'saldo' => $saldo]);
    }

    public static function _saldo(CGI $cgi)
    {
        $saldo = Movi::where('id_clasificadorGnralInstituto',$cgi->id)->orderBy('created_at', 'desc')->first();

        $saldo = ($saldo) ? $saldo->disponibilidad : 'sin movimientos' ;

        if($saldo === 'sin movimientos'){

            $saldo = $cgi->monto_original;
        }

        return $saldo;
    }

    public static function getPartida($partida)
    {
        $cg = CG::find($partida);

        return $cg;
    }
}
