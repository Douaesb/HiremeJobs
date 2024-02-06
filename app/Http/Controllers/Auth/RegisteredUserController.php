<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function createEntreprise(): View
    {
        return view('auth.registerEntreprise', ['role' => 'entreprise']);
    }

    public function createChercheur(): View
    {
        return view('auth.registerChercheur', ['role' => 'chercheur']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
            try{
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'industrie' => ['nullable', 'string', 'max:255'],
            'titre' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'poste' => ['nullable', 'string', 'max:255'],
            'tel' => ['nullable','numeric'] ,
            'adresse' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'role' => ['required', 'string', 'in:chercheur,entreprise'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);



        $user = User::create([
            'name' => $request->name,
            'photo' => $request->file('photo') ? $request->file('photo')->store('img', 'public') : null,
            'industrie' => $request->industrie,
            'titre' => $request->titre,
            'email' => $request->email,
            'poste' => $request->poste,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'description' => $request->description,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        // Log or dd($e->getMessage()) to see the exception message
        dd($e->getMessage());
    }
}
}
