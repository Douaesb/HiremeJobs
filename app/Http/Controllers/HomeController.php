<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = auth()->user()->role;
            if ($role == 'chercheur') {
                return view('chercheur.home');
            } elseif ($role == 'entreprise') {
                return view('entreprise.home');
            } else if ($role == 'admin') {
                // $userCount = User::count();
                $userCount = User::where('role', '<>', 'admin')->count();
                $chercheurCount = User::where('role', 'chercheur')->count();
                $entrepriseCount = User::where('role', 'entreprise')->count();
                $offersCount = Emploi::count();
                $topEntreprise = User::select(DB::raw("CONCAT(users.name, ' (', COUNT(emplois.id), ')') as topEntreprise"))
                    ->leftJoin('emplois', 'users.id', '=', 'emplois.user_id')
                    ->where('users.role', 'entreprise')
                    ->groupBy('users.id', 'users.name')
                    ->orderByRaw('COUNT(emplois.id) DESC')
                    ->limit(1)
                    ->value('topEntreprise');
                $topApplicant = User::select(DB::raw("CONCAT(users.name, ' (', COUNT(emploi_user.user_id), ')') as topApplicant"))
                    ->leftJoin('emploi_user', 'users.id', '=', 'emploi_user.user_id')
                    ->groupBy('users.id', 'users.name')
                    ->orderByRaw('COUNT(emploi_user.user_id) DESC')
                    ->limit(1)
                    ->value('topApplicant');
                $topSubscriber = User::select(DB::raw("CONCAT(users.name, ' (', COUNT(subscriptions.entreprise_id), ')') as topSubscriber"))
                    ->leftJoin('subscriptions', 'users.id', '=', 'subscriptions.chercheur_id')
                    ->groupBy('users.id', 'users.name')
                    ->orderByRaw('COUNT(subscriptions.entreprise_id) DESC')
                    ->limit(1)
                    ->value('topSubscriber');
                $topEntrepriseSubscriber = User::select(DB::raw("CONCAT(users.name, ' (', COUNT(subscriptions.chercheur_id), ')') as topEntrepriseSubscriber"))
                    ->leftJoin('subscriptions', 'users.id', '=', 'subscriptions.entreprise_id')
                    ->groupBy('users.id', 'users.name')
                    ->orderByRaw('COUNT(subscriptions.chercheur_id) DESC')
                    ->limit(1)
                    ->value('topEntrepriseSubscriber');


                return view('admin.dashboard', compact('userCount', 'chercheurCount', 'entrepriseCount', 'offersCount', 'topEntreprise', 'topApplicant', 'topSubscriber','topEntrepriseSubscriber'));
            }
        } else {
            return redirect()->route('login');
        }
    }
}
