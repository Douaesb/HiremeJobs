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



    public function AfficheChercheurs(){
        $chercheurs = User::where("role","=","chercheur")
        // ->whereNull('archive')
        ->whereNull('deleted_at')
        ->get();
        return view('admin.chercheurs',compact('chercheurs'));
    }


    public function archiverChercheur($userId){
        $Chercheur = User::findOrFail($userId);

        $Chercheur->delete();


        return redirect()->back()->with('success', 'Chercheur archived successfully');
   
    }
}
