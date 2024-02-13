<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ChercheurController extends Controller
{
    

    public function profileUser()
    {
        $user = Auth::user();
        return view('chercheur.profile', ['user' => $user]);
    }
}
