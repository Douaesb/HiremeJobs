<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;
use Illuminate\Support\Facades\Auth;

class MailChimpController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        Newsletter::subscribe($email);
        return redirect()->back()->with('success', 'Subscribed successfully.');
    }
}
