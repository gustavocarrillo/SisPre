<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Instituto as Inst;

class InstitutoController extends Controller
{
    public function verTodos(){
        $inst = Inst::all();

        return view('institutos.verTodos')->with('institutos',$inst);
    }

    public function nuevo(){
        return view('institutos.nuevo');
    }

    public function guardado(Request $request){

        $this->validate($request,[
            'nombre' => 'required|min:4|unique:institutos,nombre',
            'sector' => 'required',
            'actividad' => 'required',
            'direccion' => 'required|min:10',
            'responsable' => 'required|min:10']
        );

        $inst = new Inst();

        $inst->nombre = strtoupper($request->nombre);
        $inst->sector = $request->sector;
        $inst->programa = $request->programa;
        $inst->sub_programa = $request->sub_programa;
        $inst->proyecto = $request->proyecto;
        $inst->actividad = strtoupper($request->actividad);
        $inst->operacion = $request->operacion;
        $inst->direccion = strtoupper($request->direccion);
        $inst->responsable = strtoupper($request->responsable);

        if($inst->save()){
            flash('El instituto ha sido registrado exitosamente','success');
            return redirect()->route('institutos-nuevo');
        }

        flash('Ha ocurrido un error inesperado. Contcate al Dpto. de Informatica','danger');
        return redirect()->route('institutos-nuevo');
    }

    public function editar($id){
        $inst = Inst::find($id);

        return view('institutos.editar')->with('instituto',$inst);
    }

}
