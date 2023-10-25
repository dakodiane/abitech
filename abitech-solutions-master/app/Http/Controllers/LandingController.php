<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Formation;
use App\Models\Visit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('landing-page/index');
    }



    public function contact(StoreContactRequest $request): RedirectResponse
    {
        Contact::query()->create([
            'name'=>$request['name'],
            'email'=> $request['email'],
            'object'=> $request['object'],
            'message'=> $request['message'],
        ]);
        return back()->with('success', 'Votre message a été envoyé avec succès');
    }
}
