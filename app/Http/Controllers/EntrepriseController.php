<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function publishOffer(){
        return view('entreprise.offre');
    }

    public function AfficheEntreprises(){
        $entreprises = User::where("role","=","entreprise")
        ->whereNull('archive')->get();
        return view('admin.entreprises',compact('entreprises'));
    }

    public function archiverEntreprise($userId){
        $entreprise = User::find($userId);

        if ($entreprise) {
            $entreprise->update(['archive' => 1]);
        }

        return redirect()->back()->with('success', 'Entreprise archived successfully');
   
    }
}
