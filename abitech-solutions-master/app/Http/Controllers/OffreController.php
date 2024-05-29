<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\SearchActualiteRequest;
use App\Http\Requests\StoreActualiteRequest;
use App\Http\Requests\UpdateActualiteRequest;
use App\Models\Offre;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class OffreController extends Controller

{

    const OFFRE_FILES_DIRECTORY = "offres";


    public function offre()
    {
        $offres = Offre::where('active', 1)->get();

        $offres->each(function ($offre) {
            $offre->shortDescription = $this->getShortDescription($offre->description, 15);
        });

        return view('landing-page/offre/view', ['offres' => $offres]);
    }



    private function getShortDescription($description, $wordCount)
    {
        $words = explode(' ', $description);
        $shortDescription = implode(' ', array_slice($words, 0, $wordCount));
        return $shortDescription;
    }

    
    function detail(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $offre = offre::query()->findOrFail($id);
        return view('landing-page/offre/detail', compact('offre'));
    }


    /**

     * Display a listing of the resource.

     */

    public function index(ListRequest $request)

    {

        $offres = Offre::query()

            ->latest()

            ->where('nom', 'like', '%' . ($request->query('search') ?? '') . '%')

            ->paginate(

                perPage: env('PAGINATOR_PER_PAGE'),

                page: $request['page'] ?? 1

            );



        return view('offres/index', compact('offres'));
    }



    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {



        $offre = null;

        return view('offres/edit', compact('offre'));
    }

    public function search(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $offres = Offre::query()

            ->latest()

            ->where('nom', 'like', '%' . ($request->query('search') ?? '') . '%')

            ->where('active', true)

            ->paginate(

                perPage: env('PAGINATOR_PER_PAGE'),

                page: $request['page'] ?? 1

            );

        return view('landing-page/videos/search', compact('offres'));
    }





    /**

     * Store a newly created resource in storage.

     */

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'lien' => 'required|string',
             'button_name' => 'required|string',

         ]);
     
         $photoPath = null;
     
         if ($request->file('photo')) {
             $photoPath = $request->file('photo')->store('offres', 'public');
         }
     
         $offre = new Offre();
         $offre->nom = $request->input('name');
         $offre->description = $request->input('description');
         $offre->lien = $request->input('lien');
         $offre->button_name = $request->input('button_name');

         $offre->photo = $photoPath;
     
         $offre->save();
     
         return redirect(route('offres'))->with('success', 'Actualité ajoutée avec succès.');
     }
     




    /**

     * Show the form for editing the specified resource.

     */

    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $offre = Offre::query()->findOrFail($id);

        return view('offres/edit', compact('offre'));
    }





    function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $offre = Offre::query()->findOrFail($id);
        return view('offres/view', compact('offre'));
    }





    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lien' => 'required|string',
            'button_name' => 'required|string',

        ]);
    
        $photoPath = null;
    
        if ($request->file('photo')) {
            if ($offre->photo) {
                Storage::disk('public')->delete($offre->photo);
            }
            $photoPath = $request->file('photo')->store('offres', 'public');
        }
    
        $offre->nom = $request->input('name');
        $offre->description = $request->input('description');
        $offre->photo = $photoPath ?? $offre->photo;
        $offre->lien = $request->input('lien');
        $offre->button_name = $request->input('button_name');

    
        $offre->save();
    
        return redirect(route('offres'))->with('success', 'Actualité mise à jour avec succès.');
    }
    



    /**

     * Update the specified resource in storage.

     */





    /**

     * Remove the specified resource from storage.

     */

    public function destroy(offre $offre)

    {

        //

    }







    public function toggleStatus(string $id): RedirectResponse

    {

        $category = Offre::query()->findOrFail($id);

        $category->active = !$category->active;

        $category->save();

        if ($category->active)

            connectify('success', 'Succès', 'Actualité activée avec succès');

        else

            connectify('success', 'Succès', 'Actualité désactivée avec succès');

        return back()->with('success', 'Category activated successfully.');
    }
}
