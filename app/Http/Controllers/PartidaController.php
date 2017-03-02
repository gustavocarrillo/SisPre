<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasificadorGnral as ClasifGrnal;
use App\Instituto as Inst;
use App\ClasificadorGnralInstituto;
use App\TipoGasto;
use App\OrigenFondos;
use Illuminate\Support\Facades\Auth;
use DB;


class PartidaController extends Controller
{
    public function nueva(){
        $clsfGnral = ClasifGrnal::all();
        $id_instituto = Auth()->user()->id_instituto;
        $instituto = Inst::find($id_instituto);
        $tGastos = TipoGasto::all();
        $oFondos = OrigenFondos::all();

        return view('partidas.nueva')
            ->with('clsfGnral',$clsfGnral)
            ->with('instituto',$instituto)
            ->with('tGastos',$tGastos)
            ->with('oFondos',$oFondos);
    }

    public function guardada(Request $request){

        $this->validate($request,[
            'clasificador' => 'required',
            'monto_original' => 'required|min:3',
            'tipo_gasto' => 'required',
            'origen_fondos' => 'required',
        ]);

        $id_inst= Auth()->user()->id_instituto;
        $clasificador = ClasificadorGnralInstituto::where('id_clasificadorGnral',$request->clasificador)->Where('id_instituto',$id_inst)->first();

        if($clasificador){
            flash('La partida que intenta crear ya existe','warning');
            return redirect()->route('partidas-nueva');
        }

        $clasifGnralInst = new ClasificadorGnralInstituto();

        $clasifGnralInst->id_instituto = Auth()->user()->id_instituto;
        $clasifGnralInst->id_clasificadorGnral = $request->clasificador;
        $clasifGnralInst->monto_original = $this->_convertir($request->monto_original);
        $clasifGnralInst->ano_presupuesto = date('Y-m-d');
        $clasifGnralInst->fecha_creacion = date('Y-m-d');
        $clasifGnralInst->id_tipoGasto = $request->tipo_gasto;
        $clasifGnralInst->id_origenFondos = $request->origen_fondos;

        if($clasifGnralInst->save()){
            flash('Partida creada exitosamente','success');
            return redirect()->route('partidas-nueva');
        }

        flash('Se ha producido un error inesperado, contacte al Dpto. de Informatica','danger');
        return redirect()->route('partidas-nueva');
    }

    public function verTodas(){
        $inst = auth()->user()->id_instituto;

        $instituto = Inst::find($inst);

        $partidas = DB::table('clasificadorGnral_instituto')
            ->join('institutos','clasificadorGnral_instituto.id_instituto','=','institutos.id')
            ->join('clasificador_general','clasificadorGnral_instituto.id_clasificadorGnral','=','clasificador_general.id')
            ->join('tipo_gasto','clasificadorGnral_instituto.id_tipoGasto','=','tipo_gasto.id')
            ->join('origen_fondos','clasificadorGnral_instituto.id_origenFondos','=','origen_fondos.id')
            ->where('clasificadorGnral_instituto.id_instituto','=',$inst)
            ->select('clasificadorGnral_instituto.id',
                    'clasificador_general.partida',
                    'clasificadorGnral_instituto.monto_original',
                    'clasificadorGnral_instituto.fecha_creacion',
                    'clasificadorGnral_instituto.partida_alterna',
                    'tipo_gasto.tipo_gasto',
                    'origen_fondos.nombre'
                )
            ->get();

        return view('partidas.verTodas')->with('partidas',$partidas)->with('inst',$instituto);
    }

    public function eliminar($id){

        $partida = ClasificadorGnralInstituto::find($id);

        $partida->delete();

        flash('Partida eliminada exitosamente','success');
        return redirect()->route('partidas-ver');
    }

    public function editar($id){
        $id_instituto = Auth()->user()->id_instituto;
        $instituto = Inst::find($id_instituto);
        $clsfGnralInst = ClasificadorGnralInstituto::find($id);
        $clsfGnral = ClasifGrnal::find($clsfGnralInst->id_clasificadorGnral);
        $tGastos = TipoGasto::all();
        $oFondos = OrigenFondos::all();

        return view('partidas.editar')
            ->with('clsfGnralInst',$clsfGnralInst)
            ->with('clsfGnral',$clsfGnral)
            ->with('instituto',$instituto)
            ->with('tGastos',$tGastos)
            ->with('oFondos',$oFondos);
    }

    public function editada(Request $request){
        $partida = ClasificadorGnralInstituto::find($request->id_partida);

        $partida->monto_original = $this->_convertir($request->monto_original);
        $partida->id_tipoGasto = $request->tipo_gasto;
        $partida->id_origenFondos = $request->origen_fondos;

        $partida->save();

        flash('Partida modificada exitosamente','success');
        return redirect()->route('partidas-ver');
    }

    private function _convertir($num){

        //Se debe descomentar el modulo Intl en php.ini para que funcione
        //formatea el monto original a formato entendido por MySQL
        $_parse = numfmt_create('es_ES',\NumberFormatter::DECIMAL);
        $_result = numfmt_parse($_parse,$num);

        return $_result;
    }
}
