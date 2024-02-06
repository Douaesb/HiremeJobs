<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    // public function index()
    // {
    //     if (Auth::id()) {
    //         $role = auth()->user()->role;
    //         if ($role == 'chercheur') {
    //             return view('chercheur.home');
    //         } elseif ($role == 'entreprise') {
    //             return view('entreprise.home');
    //         } else if ($role == 'admin') {
    //             return view('admin.dashboard');
    //         }
    //     }
    // }

    public function index()
{
    if (Auth::check()) {
        $user = auth()->user(); // Get the authenticated user

        $role = $user->role;

        if ($role == 'chercheur') {
            return view('chercheur.home', compact('user'));
        } elseif ($role == 'entreprise') {
            return view('entreprise.home', compact('user'));
        } elseif ($role == 'admin') {
            return view('admin.dashboard', compact('user'));
        } else {
            // Default behavior if the user has an unknown role
            return redirect()->route('default.home'); // Adjust the route accordingly
        }
    } else {
        // User is not authenticated, you might want to redirect them to the login page
        return redirect()->route('login');
    }
}



    public function archive(){
        return view('admin.archive');
    }
}
