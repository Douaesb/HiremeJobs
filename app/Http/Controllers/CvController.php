<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\CV;

class CvController extends Controller
{
    
    public function createCV(){
        return view('chercheur.cv');
    }

    public function storeCV(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'competences' => ['nullable', 'array'],
                'experiences' => ['nullable', 'array'],
                'cursus' => ['nullable', 'array'],
                'langues' => ['nullable', 'array'],
            ]);
    
            $competencesJson = json_encode($request->input('competences'));
            $experiencesJson = json_encode($request->input('experiences'));
            $cursusJson = json_encode($request->input('cursus'));
            $languesJson = json_encode($request->input('langues'));

    
            $user = Auth::user(); 
    
            CV::create([
                'competences' => $competencesJson, 
                'experiences' => $experiencesJson, 
                'cursus' => $cursusJson, 
                'langues' => $languesJson, 
                'user_id' => $user->id,
            ]);
    
            return redirect()->route('success.route'); 
    
        } catch (\Exception $e) {
           
            dd($e->getMessage());
        }
    }
}
