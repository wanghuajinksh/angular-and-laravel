<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusquedaRequest;
use App\Jugador;
use App\Mail\Busqueda;
use App\Manager;
use App\Provincia;
use Illuminate\Http\Request;
use App\Pais;
use Illuminate\Support\Facades\Mail;

class AjustesController extends Controller
{
    public function test(){
        $jugs = Jugador::all();

        $find = 'public/profiles';
        $for = 'storage/profiles';

        foreach ($jugs as $j){
           $f_exist = file_exists(public_path($j->link_img));
           if(! $f_exist || empty($j->link_img)){
//               $j->link_img = null;
//               $j->save();
           }

        }

        dd('dome');
    }
}
