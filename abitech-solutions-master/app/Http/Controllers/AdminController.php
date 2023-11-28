<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Inscription;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function view()
    {
        $inscriptions = Inscription::all();
        return view('liste', ['inscriptions' => $inscriptions]);
    }
}