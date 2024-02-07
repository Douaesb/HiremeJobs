<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function publishOffer(){
        return view('entreprise.offre');
    }
}
