<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Instituto as Inst;

class AutenticacionController extends Controller
{

    public function nuevo(){
        $institutos = Inst::all();
        return view('auth.registro')->with('institutos',$institutos);
    }

    public function crear(Request $request){

        $this->validate($request,[
            'nombre' => 'required|min:4',
            'usuario' => 'required|unique:users,username',
            'clave' => 'required|min:4|max:8|confirmed',
            'email' => 'email|unique:users,email',
            'tipo' => 'required',
            'nivel' => 'required',
            'estatus' => 'required',
        ]);

        $user = new User();
        $user->nombre = strtoupper($request->nombre);
        $user->username = strtoupper($request->usuario);
        $user->password = bcrypt($request->clave);
        $user->email = strtoupper($request->email);
        $user->tipo = strtoupper($request->tipo);
        $user->nivel = strtoupper($request->nivel);
        $user->estatus = strtoupper($request->estatus);

        if($user->save()){
            flash('Usuario Creado Exitosamente','success');
            return redirect()->route('user-registro');
        }else{
            flash('ERROR INESPERADO','danger');
            return redirect()->route('user-registro');
        }
    }

    public function entrar(Request $request){

        if (Auth::attempt(['username' => $request->usuario, 'password' => $request->clave, 'estatus' => 'activo'])) {
            return redirect()->intended('admin/inicio');
        }

        flash('ERROR: Usuario / Clave Incorrectos o Usuario Inactivo. ','warning');
        return redirect()->to('login');
    }

    public function salir(){
        Auth::logout();
        return redirect()->to('/');
    }
}
