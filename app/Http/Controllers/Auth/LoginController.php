<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

//        if ($remember) {
//            \Config::set('session.remember_me_lifetime', 1440); // 1 jour
//        } else {
//            \Config::set('session.lifetime', 10); // 10 minutes
//        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

//            dd(cookie()->getQueuedCookies());

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Adresse email incorrect.',
            'password' => 'Mot de passe incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
