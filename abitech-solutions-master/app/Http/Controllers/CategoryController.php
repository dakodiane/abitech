<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()
            ->where('name', 'like','%'.($request->query('search') ?? '').'%')
            ->get();
        return view('categories/index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::query()->create($request->all());
        connectify('success', 'Succès', 'Catégorie créée avec succès');
        return back()->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function toggleStatus(string $id): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);
        if($category->active && Category::query()->where('active', true)->whereNot('id', $category->id)->count() == 0){
            return back()->withErrors( ['Toutes les catégories ne peuvent pas etre désactivées']);
        }
        $category->active = !$category->active;
        $category->save();
        if($category->active)
            connectify('success', 'Succès', 'Catégorie activée avec succès');
        else
            connectify('success', 'Succès', 'Catégorie désactivée avec succès');
        return back()->with('success', 'Category activated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, UpdateCategoryRequest $request): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->all());
        connectify('success', 'Succès', 'Catégorie mise à jour avec succès');
        return back()->with('success', 'Category updated successfully.');
    }
}
