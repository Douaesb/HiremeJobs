<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
                return view('admin.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }




    public function archive()
    {
        return view('admin.archive');
    }
}
