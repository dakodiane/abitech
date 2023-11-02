<?php

namespace App\Http\Controllers;
use App\Models\Actualite;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::where('active', 1)->get(); 
    
        $actualites->each(function ($actualite) {
            $actualite->shortDescription = $this->getShortDescription($actualite->description, 15);
        });
    
        return view('landing-page/actualite/view', ['actualites' => $actualites]);
    }
    
    
    
private function getShortDescription($description, $wordCount)
{
    $words = explode(' ', $description);
    $shortDescription = implode(' ', array_slice($words, 0, $wordCount));
    return $shortDescription;
}
function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
{
    $actualite = Actualite::query()->findOrFail($id);
    return view('landing-page/actualite/detail', compact('actualite'));
}
    
}


