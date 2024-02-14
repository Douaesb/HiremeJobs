<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class MailChimpController extends Controller
{

    public function subscribe(Request $request, $entrepriseId)
{
    $user = Auth::user();

    $subscription = Subscription::where('entreprise_id', $entrepriseId)
        ->where('chercheur_id', $user->id)
        ->first();

    if (!$subscription) {
        Subscription::create([
            'chercheur_id' => Auth::user()->id,
            'entreprise_id' => $entrepriseId,
            'subscribed' => true,
        ]);
        $email = Auth::check() ? Auth::user()->email : $request->email;
        Newsletter::subscribe($email);
    }

    return redirect()->back()->with('success', 'Subscribed successfully.');
}

    // public function subscribe(Request $request)
    // {
    //     $email = Auth::check() ? Auth::user()->email : $request->email;
    //     Newsletter::subscribe($email);
    //     return redirect()->back()->with('success', 'Subscribed successfully.');
    // }
}
