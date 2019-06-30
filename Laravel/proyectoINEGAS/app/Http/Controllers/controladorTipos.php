<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorTipos extends Controller
{
    public static function getTipo($idTipo){
        return DB::table('tipo')->where('id',$idTipo)->value('nombre');
    }
}