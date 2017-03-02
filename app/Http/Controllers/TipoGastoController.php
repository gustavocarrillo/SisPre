<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoGasto as TG;

class TipoGastoController extends Controller
{
    public function nuevo(){
        return view('tipo_gasto.nuevo');
    }

    public function guardado(Request $request){

        $this->validate($request,[
            'tipo_gasto' => 'required|min:4|unique:tipo_gasto,tipo_gasto'
        ]);

        $of = new TG();

        $of->tipo_gasto = $request->tipo_gasto;

        $of->save();

        flash('Tipo de Gasto creado exitosamente','success');
        return redirect()->route('tipoGasto-nuevo');
    }

    public function verTodos(){
        $tg = TG::all();

        return view('tipo_gasto.verTodos')->with('tipo_gastos',$tg);
    }

    public function editar($id){

        $tg = TG::find($id);

        return view('tipo_gasto.editar')->with('tipo_gastos',$tg);
    }

    public function editado(Request $request){

        $this->validate($request,[
            'tipo_gasto' => 'required|min:4|unique:tipo_gasto,tipo_gasto'
        ]);

        $tg = TG::find($request->id);

        $tg->tipo_gasto = $request->tipo_gasto;

        $tg->save();

        flash('Tipo de Gasto modificado exitosamente','success');
        return redirect()->route('tipoGasto-ver');
    }

    public function eliminar($id){

        $tg = TG::find($id);

        $tg->delete();

        flash('Tipo de Gasto ha sido eliminado','success');
        return redirect()->route('tipoGasto-ver');
    }
}
