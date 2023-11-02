<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($attributes))
        {
         
            return redirect(route('dashboard'))->with(['success'=>'Connexion réussie.']);
        }
        else{
            return back()->withErrors(['email'=> 'Addresse email ou mot de passe incorrect.']);
        }
    }

    public function destroy(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();
        return redirect(route('login'))->with(['success'=>'Vous êtes déconnecté.']);
    }
}
