<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CatalogoModificacion as Cmodif;

class CatalogoModifController extends Controller
{
    public function nuevo()
    {
        return view('catalogo_modificaciones.nuevo');
    }

    public function guardado(Request $request)
    {
        $Cmodif = new Cmodif();

        $Cmodif->nombre = $request->nombre;

        $Cmodif->tipo = $request->tipo;

        $Cmodif->save();

        flash('Modificación creada exitosamente','success');

        return redirect()->route('catalogoModif-verTodas');
    }

    public function verTodas()
    {
        $Cmodificaciones = Cmodif::all();

        return view('catalogo_modificaciones.verTodas')->with('modificaciones',$Cmodificaciones);
    }

    public function editar($id)
    {
        $Cmodif = Cmodif::find($id);

        return view('catalogo_modificaciones.editar')->with('modif',$Cmodif);
    }
}
