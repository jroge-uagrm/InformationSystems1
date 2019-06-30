<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPagos extends Controller
{
    public function pagos(){
        return view('pagos');
    }
}