<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;



class EmploiController extends Controller
{

    public function publishOffer(){
        return view('entreprise.offre');
    }

    public function storePublishOffer(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'competences' => ['required', 'array'],
                'type_contrat' => ['required', 'string', 'in:a distance,hybride,a temps plein'],
                'emplacement' => ['required', 'string'],
            ]);
    
            $competencesJson = json_encode($request->input('competences'));
    
            $user = Auth::user(); 
    
            Emploi::create([
                'nom' => $request->nom,
                'titre' => $request->titre,
                'description' => $request->description,
                'competences' => $competencesJson, 
                'type_contrat' => $request->type_contrat,
                'emplacement' => $request->emplacement,
                'user_id' => $user->id,
            ]);
    
            return redirect()->route('success.route'); 
    
        } catch (\Exception $e) {
           
            dd($e->getMessage());
        }
    }
}
