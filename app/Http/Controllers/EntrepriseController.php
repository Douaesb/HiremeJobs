<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function publishOffer(){
        return view('entreprise.offre');
    }

    public function AfficheEntreprises(Request $request)
    {
        $query = User::where("role", "=", "entreprise")
            ->whereNull('archive');
    
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%$search%")
                    ->orWhere('industrie', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }
    
        $entreprises = $query->get();
    
        return view('entreprises', compact('entreprises'));
    }
    

    public function archiverEntreprise($userId){
        $entreprise = User::find($userId);

        if ($entreprise) {
            $entreprise->update(['archive' => 1]);
        }

        return redirect()->back()->with('success', 'Entreprise archived successfully');
   
    }
}
