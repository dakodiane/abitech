<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('projet')) {
            $photoPath = $request->file('projet')->store('projet', 'public');
            $data['projet'] = $photoPath;
        }
        $formation = new Inscription();

        $formation->fill($data);

        $formation->save();
    // Retourne une réponse JSON
    return response()->json(['success' => true]);
}
}