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
        $formations =  Formation::query()
            ->latest()
            ->where('name', 'like','%'.($request->query('search') ?? '').'%')
            ->paginate(
            perPage: env('PAGINATOR_PER_PAGE'),
            page: $request['page'] ?? 1
        );
        $categories = Category::query()->where('active', true)->get();
        return view('formations/index', compact('formations', 'categories'));
    }


    function view(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = Formation::query()->findOrFail($id);
        $formation['visited'] = $formation['visited'] + 1;
        $formation->save();
        return view('landing-page/formations/view', compact('formation'));
    }


    function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = Formation::query()->findOrFail($id);
        return view('formations/view', compact('formation'));
    }

    public function search(SearchFormationRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $formations =  Formation::query()
            ->where('name', 'like', '%'.($request->query('search') ?? '').'%')
            ->where(function ($query) use ($request){
                if($request->query('categories') !== null ){
                    $query->whereIn('category_id', $request->query('categories'));
                }
            })
            ->where('active', true)
            ->paginate(
                perPage: env('PAGINATOR_PER_PAGE'),
                page: $request['page'] ?? 1
            );
        $categories = Category::query()->where('active', true)->get();
        return view('landing-page/formations/search', compact('formations', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()->where('active', true)->get();
        $formation = null;
        return view('formations/edit', compact('categories', 'formation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormationRequest $request): RedirectResponse
    {
        $formation = $request->all();
        $formation['additional_information'] = $this->encodeAdditionalInformationFromRequest($request);
        $formation['image'] = $request->file('image') !== null ? $this->uploadFormationFile($formation->id, $request->file('image'), 'cover') : null;
        $formation['document'] = $request->file('document') !== null ? $this->uploadFormationFile($formation->id, $request->file('document'), 'document') : null;
        $formation['video'] = $request->file('video') !== null ? $this->uploadFormationFile($formation->id, $request->file('video'), 'video') : null;
        Formation::query()->create($formation);
        connectify('success', 'Succès', 'Formation créée avec succès');
        return redirect(route('formations'))->with('success', 'Formation created successfully.');
    }



    public function toggleStatus(string $id): RedirectResponse
    {
        $formation = Formation::query()->findOrFail($id);
        $formation->active = !$formation->active;
        $formation->save();
        if($formation->active)
            connectify('success', 'Succès', 'Catégorie activée avec succès');
        else
            connectify('success', 'Succès', 'Catégorie désactivée avec succès');
        return back()->with('success', 'Category activated successfully.');
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
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = Formation::query()->findOrFail($id);
        $categories = Category::query()->where('active', true)->get();
        return view('formations/edit', compact('formation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormationRequest $request): RedirectResponse
    {
        $formation = Formation::query()->findOrFail($request['id']);
        $formation->fill($request->all());
        $formation['additional_information'] = $this->encodeAdditionalInformationFromRequest($request);
        $formation['image'] = $request->file('image') !== null ? $this->uploadFormationFile($formation->id, $request->file('image'), 'cover') : $formation['image'];
        $formation['document'] = $request->file('document') !== null ? $this->uploadFormationFile($formation->id, $request->file('document'), 'document') : $formation['document'];
        $formation['video'] = $request->file('video') !== null ? $this->uploadFormationFile($formation->id, $request->file('video'), 'video') : $formation['video'];
        $formation->save();
        connectify('success', 'Succès', 'Formation mise à jour avec succès');
        return redirect(route('formations'))->with('success', 'Formation updated successfully.');
    }

    private function encodeAdditionalInformationFromRequest($request){
        if(isset($request['additional_information']) &&  $request['additional_information'] != null){
            $additional_information = [];
            foreach ($request['additional_information']['label'] as $key => $label) {
                $additional_information[] = [
                    'label' => $label,
                    'value' => $request['additional_information']['value'][$key]
                ];
            }
            return json_encode($additional_information);
        }
        return null;
    }

    public static function uploadFormationFile(string $uid , $file, ?string $name = null): string
    {
        return $file->storeAs(
            self::FORMATIONS_FILES_DIRECTORY . "/" . $uid,
            $uid . "." . ($name ?? '') . '.' . $file->getClientOriginalExtension(),
            ['disk' => 'default']
        );
    }
}
