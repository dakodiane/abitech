<?php

namespace App\Http\Controllers;
use App\Models\Actualite;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class LienController extends Controller
{
    public function index()
    {
    
        return view('liens/index');
    }
    
    
}


