<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function inicio(){
        return view('admin.plantilla');
    }
}
