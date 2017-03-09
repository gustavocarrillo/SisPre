<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Instituto as Inst;
use Illuminate\Support\Facades\Auth;

class InstitutoController extends Controller
{
    public function verTodos(){
        $inst = Inst::all();

        return view('institutos.verTodos')->with('institutos',$inst);
    }

    public function ver(){
        $inst = Inst::find(Auth::user()->id_instituto);

        return view('institutos.ver')->with('instituto',$inst);
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
        $inst->sector = strtoupper($request->sector);
        $inst->programa = strtoupper($request->programa);
        $inst->sub_programa = strtoupper($request->sub_programa);
        $inst->proyecto = strtoupper($request->proyecto);
        $inst->actividad = strtoupper($request->actividad);
        $inst->operacion = strtoupper($request->operacion);
        $inst->direccion = strtoupper($request->direccion);
        $inst->responsable = strtoupper($request->responsable);

        if($inst->save()){
            flash('El instituto ha sido registrado exitosamente','success');
            return redirect()->route('institutos-nuevo');
        }

        flash('Ha ocurrido un error inesperado. Contcate al Dpto. de Informatica','danger');
        return redirect()->route('institutos-nuevo');
    }

    public function editar(){

        $id_inst = Auth::user()->id_instituto;

        $inst = Inst::find($id_inst);

        return view('institutos.editar')->with('instituto',$inst);
    }

    public function editado(Request $request){
        $inst = Inst::find($request->id);

        $inst->nombre = strtoupper($request->nombre);
        $inst->sector = strtoupper($request->sector);
        $inst->programa = strtoupper($request->programa);
        $inst->sub_programa = strtoupper($request->sub_programa);
        $inst->proyecto = strtoupper($request->proyecto);
        $inst->actividad = strtoupper($request->actividad);
        $inst->operacion = strtoupper($request->operacion);
        $inst->direccion = strtoupper($request->direccion);
        $inst->responsable = strtoupper($request->responsable);

        if($inst->final == 'N' && isset($request->final)){
            $inst->final = $request->final;
        }

        $inst->save();

        $inst = Inst::find($request->id);

        return redirect()->route('institutos-ver');
    }

}
