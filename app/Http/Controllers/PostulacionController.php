<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index(Vacante $vacante){

        $postulaciones = $vacante->postulaciones;
        
        return view('postulaciones.index',[
            "vacante"=> $vacante,
            "postulaciones" => $postulaciones
        ]);
    }
}
