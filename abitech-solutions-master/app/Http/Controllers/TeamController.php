<?php



namespace App\Http\Controllers;



use App\Http\Requests\ListRequest;

use App\Http\Requests\SearchActualiteRequest;

use App\Http\Requests\StoreActualiteRequest;

use App\Http\Requests\UpdateActualiteRequest;
use App\Models\Team;

use Illuminate\Contracts\View\Factory;

use Illuminate\Contracts\View\View;

use Illuminate\Foundation\Application;

use Illuminate\Http\RedirectResponse;

use JetBrains\PhpStorm\NoReturn;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class TeamController extends Controller

{

    const TEAMS_FILES_DIRECTORY = "teams";



    /**

     * Display a listing of the resource.

     */

     public function index(ListRequest $request):  View|Application|Factory|\Illuminate\Contracts\Foundation\Application

     {
 
         $teams =  Team::query()
 
             ->latest()
             ->where('nom', 'like','%'.($request->query('search') ?? '').'%')
             ->paginate(
             perPage: env('PAGINATOR_PER_PAGE'),
             page: $request['page'] ?? 1
 
         );
  
         return view('teams/index', compact('teams'));
 
     }

     public function equipe()
     {
         $members = Team::where('active', true)
                        ->orderBy('created_at', 'asc')
                        ->get();
     
         return view('equipe', compact('members'));
     }
     

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

       

        $team = null;

        return view('teams/edit', compact( 'team'));

    } 

    /**

     * Store a newly created resource in storage.

     */

     public function store(Request $request)
     {
         $request->validate([
             'nom' => 'required|string|max:255',
             'poste' => 'required|string',
             'email' => 'required|email','email',
             'linkedin' => 'required|string',
             'photo' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,svg|max:20480', 
            ]);
     
         $data = []; // Initialisez le tableau $data
     
         if ($request->hasFile('photo')) {
             $photoPath = $request->file('photo')->store('team', 'public');
             $data['photo'] = $photoPath;
         }
     
         $team = new Team();
         $team->nom = $request->input('nom');
         $team->poste = $request->input('poste');
         $team->email = $request->input('email');
         $team->linkedin = $request->input('linkedin');
         $team->photo = $data['photo'] ?? null; // Utilisez $data['photo'] ici
     
         $team->save();
     
         return redirect(route('teams'))->with('success', 'Membre ajouté avec succès.');
     }
     
     
    





    /**

     * Display the specified resource.

     */

    public function show(Team $Actualite)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     */

    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {
        $team = Team::query()->findOrFail($id);
        
        return view('teams/edit', compact('team'));
    }

    public function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $team= Team::find($id);
        $total = Team::count();
        return view('teams.view', compact('team', 'total'));
    }
    

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string',
            'email' => 'required|email',
            'linkedin' => 'required|string',
            'photo' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,svg',
        ]);
    
        $teamId = $request->input('id');

        $team = Team::find($teamId);


        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('team', 'public');
            $data['photo'] = $photoPath;
        }
    
        $team->nom = $request->input('nom');
        $team->poste = $request->input('poste');
        $team->email = $request->input('email');
        $team->linkedin = $request->input('linkedin');
        $team->photo = $data['photo'] ?? null;
    
        $team->save();
    
        return redirect(route('teams'))->with('success', 'Actualité mise à jour avec succès.');
    }
    
    

    /**

     * Update the specified resource in storage.

     */

   



    /**

     * Remove the specified resource from storage.

     */

    public function destroy(Team $actualite)

    {

        //

    }



    public function toggleStatus(string $id): RedirectResponse

    {

        $team = Team::query()->findOrFail($id);

        $team->active = !$team->active;

        $team->save();

        if($team->active)

            connectify('success', 'Succès', 'Catégorie activée avec succès');

        else

            connectify('success', 'Succès', 'Catégorie désactivée avec succès');

        return back()->with('success', 'Category activated successfully.');

    }


}