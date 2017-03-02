<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasificadorGnral as CG;

class ClasificadorController extends Controller
{
    public function nuevo(){
        return view('clasificador.nuevo');
    }

    public function guardado(Request $request){

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

    public function verTodos(){
        $cg = CG::all();

        return view('clasificador.verTodos')->with('clasifGnral',$cg);
    }

    public function editar($id){

        $cg = CG::find($id);

        return view('clasificador.editar')->with('clasifGnral',$cg);
    }

    public function editado(Request $request){

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

    public function eliminar($id){

        $cg = CG::find($id);

        $cg->delete();

        flash('El elemento ha sido eliminado','success');
        return redirect()->route('clasifGnral-ver');
    }
}
