<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\SearchFormationRequest;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use App\Models\Category;
use App\Models\Formation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\NoReturn;

class FormationController extends Controller
{
    const FORMATIONS_FILES_DIRECTORY = "formations";

    /**
     * Display a listing of the resource.
     */
    public function index(ListRequest $request):  View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
       
        return view('formations/index');
    }
    public function search(ListRequest $request):  View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
       
        return view('landing-page/formations/search');
    }


   

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormationRequest $request): RedirectResponse
    {
        return redirect(route('formations'))->with('success', 'Formation created successfully.');
    }



 
    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  
    /**
     * Update the specified resource in storage.
     */
 
 

  
}
