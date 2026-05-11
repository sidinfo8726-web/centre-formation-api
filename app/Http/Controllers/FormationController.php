<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    // AFFICHER
    public function index()
    {
        return Formation::all();
    }

    // AJOUTER
    public function store(Request $request)
    {
        $formation = Formation::create($request->all());

        return response()->json($formation, 201);
    }

    // MODIFIER
    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $formation->update($request->all());

        return response()->json($formation);
    }

    // SUPPRIMER
    public function destroy($id)
    {
        Formation::destroy($id);

        return response()->json([
            'message' => 'Formation supprimée'
        ]);
    $request->validate([
    'titre' => 'required',
    'description' => 'required',
    'prix' => 'required'
]);
    }
}