<?php

namespace App\Http\Controllers;

use \PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\CV;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class CvController extends Controller
{
    
    public function createCV(){
        $user = Auth::user();
        $cv = $user->cv;
        return view('chercheur.cv',compact('cv'));
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
    
            $user = Auth::user();
    
            if ($user->cv) {
                return redirect()->route('cvs')->with('error', 'You already have a CV.');
            }
    
            $competencesJson = json_encode($request->input('competences'));
            $experiencesJson = json_encode($request->input('experiences'));
            $cursusJson = json_encode($request->input('cursus'));
            $languesJson = json_encode($request->input('langues'));
    
            CV::create([
                'competences' => $competencesJson, 
                'experiences' => $experiencesJson, 
                'cursus' => $cursusJson, 
                'langues' => $languesJson, 
                'user_id' => $user->id,
            ]);
    
            return redirect()->route('cvs'); 
    
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function downloadCv()
    {
        $cv = CV::where('user_id', auth()->id())->firstOrFail();

        $pdf = FacadePdf::loadView('chercheur.profilePDF', compact('cv'));

        return $pdf->download('your_cv.pdf');
    }
    
}
