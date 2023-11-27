<?php



namespace App\Http\Controllers;



use App\Http\Requests\ListRequest;

use App\Http\Requests\SearchActualiteRequest;

use App\Http\Requests\StoreActualiteRequest;

use App\Http\Requests\UpdateActualiteRequest;

use App\Models\Category;

use App\Models\Actualite;

use Illuminate\Contracts\View\Factory;

use Illuminate\Contracts\View\View;

use Illuminate\Foundation\Application;

use Illuminate\Http\RedirectResponse;

use JetBrains\PhpStorm\NoReturn;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class ActualitesController extends Controller

{

    const ACTUALITES_FILES_DIRECTORY = "actualites";



    /**

     * Display a listing of the resource.

     */

    public function index(ListRequest $request)

    {

        $actualites = Actualite::query()

        ->latest()

        ->where('nom', 'like','%'.($request->query('search') ?? '').'%')

        ->paginate(

            perPage: env('PAGINATOR_PER_PAGE'),

            page: $request['page'] ?? 1

        );

    

        return view('actualites/index', compact('actualites'));

    }

    

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

       

        $actualite = null;

        return view('actualites/edit', compact( 'actualite'));

    } 

    public function search(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $actualites = Actualite::query()

            ->latest()

            ->where('nom', 'like','%'.($request->query('search') ?? '').'%')

            ->where('active', true)

            ->paginate(

                perPage: env('PAGINATOR_PER_PAGE'),

                page: $request['page'] ?? 1

            );

        return view('landing-page/videos/search', compact('actualites'));

    }





    /**

     * Store a newly created resource in storage.

     */

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'photo1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'photo3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'photo4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'photo5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         $photoPaths = [];
     
         for ($i = 1; $i <= 5; $i++) {
             $photoName = "photo" . $i;
     
             if ($request->file($photoName)) {
                 $path = $request->file($photoName)->store('actualite', 'public');
                 $photoPaths[$photoName] = $path;
             }
         }
     
         $actualite = new Actualite();
         $actualite->nom = $request->input('name');
         $actualite->description = $request->input('description');
         $actualite->photo1 = $photoPaths['photo1'] ?? null;
         $actualite->photo2 = $photoPaths['photo2'] ?? null;
         $actualite->photo3 = $photoPaths['photo3'] ?? null;
         $actualite->photo4 = $photoPaths['photo4'] ?? null;
         $actualite->photo5 = $photoPaths['photo5'] ?? null;
     
         $actualite->save();
     
         return redirect(route('actualites'))->with('success', 'Actualité ajoutée avec succès.');
     }
     
    





    /**

     * Display the specified resource.

     */

    public function show(Actualite $Actualite)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     */

    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $actualite = Actualite::query()->findOrFail($id);

        return view('actualites/edit', compact('actualite'));

    }





    function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $actualite = Actualite::query()->findOrFail($id);

        return view('actualites/view', compact('actualite'));

    }





    public function update(Request $request, Actualite $actualite)

    {

        $request->validate([

            'name' => 'required|string|max:255',

            'description' => 'required|string',

            'photo1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'photo3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'photo4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'photo5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $actualiteId = $request->input('actualite_id');

        $actualite = Actualite::find($actualiteId);



        $photoPaths = [];

        for ($i = 1; $i <= 5; $i++) {

            $photoName = "photo" . $i;
            if ($request->file($photoName)) {

                if ($actualite->$photoName) {

                    Storage::disk('public')->delete($actualite->$photoName);

                }
                $path = $request->file($photoName)->store('actualite', 'public');
                $photoPaths[$photoName] = $path;
            }

        }

    

        $actualite->nom = $request->input('name');

        $actualite->description = $request->input('description');

        $actualite->photo1 = $photoPaths['photo1'] ?? $actualite->photo1;

        $actualite->photo2 = $photoPaths['photo2'] ?? $actualite->photo2;

        $actualite->photo3 = $photoPaths['photo3'] ?? $actualite->photo3;

        $actualite->photo4 = $photoPaths['photo4'] ?? $actualite->photo4;

        $actualite->photo5 = $photoPaths['photo5'] ?? $actualite->photo5;

    

        $actualite->save();

    

        return redirect(route('actualites'))->with('success', 'Actualité mise à jour avec succès.');

    }

    

    /**

     * Update the specified resource in storage.

     */

   



    /**

     * Remove the specified resource from storage.

     */

    public function destroy(Actualite $actualite)

    {

        //

    }



  



    public function toggleStatus(string $id): RedirectResponse

    {

        $category = Actualite::query()->findOrFail($id);

        $category->active = !$category->active;

        $category->save();

        if($category->active)

            connectify('success', 'Succès', 'Actualité activée avec succès');

        else

            connectify('success', 'Succès', 'Actualité désactivée avec succès');

        return back()->with('success', 'Category activated successfully.');

    }

}