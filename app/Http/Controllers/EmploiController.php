<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;
use App\Models\User;
use App\Models\EmploiUser;




class EmploiController extends Controller
{

    // public function publishOfferAll()
    // {
    //     $offers = Emploi::with('entreprise')
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return view('jobOffers', ['offers' => $offers]);
    // }


    public function publishOfferAll(Request $request)
    {
        $query = Emploi::with('entreprise')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%$search%")
                    ->orWhere('competences', 'like', "%$search%");
                $q->orWhere(function ($inner) use ($search) {
                    $inner->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(competences, '$[*]')) LIKE ?", ["%$search%"]);
                });

                $q->orWhere('type_contrat', 'like', "%$search%")
                    ->orWhere('emplacement', 'like', "%$search%");
            });
        }

        $query->whereNull('deleted_at');
        // $query->whereNull('archive');
        $offers = $query->get();

        return view('jobOffers', ['offers' => $offers]);
    }



    public function publishOffer()
    {
        $user = Auth::user();

        $offers = Emploi::with('entreprise')
            ->whereNull('deleted_at')
            // ->whereNull('archive')
            ->orwhere('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('entreprise.offre', ['offers' => $offers]);
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

            return redirect()->route('jobs');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }


    public function viewCandidats($offreId)
    {
        $emploi = Emploi::with('chercheurs')->find($offreId);

        return view('entreprise.candidatures', ['emploi' => $emploi]);
    }

    // public function archiverOffer($offerId)
    // {
    //     $offer = Emploi::find($offerId);

    //     if ($offer) {
    //         $offer->update(['archive' => 1]);
    //         return redirect()->back()->with('success', 'Offer archived successfully');
    //     }

    //     return redirect()->back()->with('error', 'Offer not found');
    // }

    public function archiverOffer($offerId)
    {
        $offer = Emploi::findOrFail($offerId);

        $offer->delete();

        return redirect()->back()->with('success', 'Record soft deleted successfully.');
    }

    public function EntrepriseOffers($entrepriseId)
    {
        $entreprise = User::find($entrepriseId);
        $emplois = $entreprise->emplois()
            ->whereNull('deleted_at');
        return view('chercheur.entrepriseOffers', compact('entreprise', 'emplois'));
    }


    public function postuler(Request $request, Emploi $emploi)
    {
        $user = auth()->user();
        $existingApplication = EmploiUser::where('user_id', $user->id)
            ->where('emploi_id', $emploi->id)
            ->first();

        if (!$existingApplication) {
            EmploiUser::create([
                'user_id' => $user->id,
                'emploi_id' => $emploi->id,
            ]);

            return redirect()->route('AllOffers')->with('success', 'Application successful!');
        }

        return redirect()->route('AllOffers')->with('error', 'You have already applied for this job.');
    }
}
