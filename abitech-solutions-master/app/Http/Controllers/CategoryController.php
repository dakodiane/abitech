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
   
}
