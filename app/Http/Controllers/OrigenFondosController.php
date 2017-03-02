<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OrigenFondos as OF;

class OrigenFondosController extends Controller
{
    public function nuevo(){
        return view('origen_fondos.nuevo');
    }

    public function guardado(Request $request){

        $this->validate($request,[
            'nombre' => 'required|min:4|unique:origen_fondos,nombre'
        ]);

        $of = new OF();

        $of->nombre = $request->nombre;

        $of->save();

        flash('Origen de Fondos creado exitosamente','success');
        return redirect()->route('origenFondos-nuevo');
    }

    public function verTodos(){
        $of = OF::all();

        return view('origen_fondos.verTodos')->with('origen_fondos',$of);
    }

    public function editar($id){

        $of = OF::find($id);

        return view('origen_fondos.editar')->with('origen_fondos',$of);
    }

    public function editado(Request $request){

        $this->validate($request,[
            'nombre' => 'required|min:4|unique:origen_fondos,nombre'
        ]);

        $of = OF::find($request->id);

        $of->nombre = $request->nombre;

        $of->save();

        flash('Origen de Fondos modificado exitosamente','success');
        return redirect()->route('origenFondos-ver');
    }

    public function eliminar($id){

        $of = OF::find($id);

        $of->delete();

        flash('Origen de fondos ha sido eliminado','success');
        return redirect()->route('origenFondos-ver');
    }
}
