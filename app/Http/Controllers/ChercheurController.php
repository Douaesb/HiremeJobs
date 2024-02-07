<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChercheurController extends Controller
{
    public function about(){
        return view('chercheur.about');
    }
}
