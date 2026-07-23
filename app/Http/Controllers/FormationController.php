<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    // AFFICHER
    public function index()
    {
        return response()->json(Formation::all());
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
        $formation = Formation::findOrFail($id);

    if ($formation->inscriptions()->exists()) {
        return response()->json([
            'message' => 'Impossible de supprimer cette formation car elle possède des inscriptions.'
        ], 400);
    }

    $formation->delete();

    return response()->json([
        'message' => 'Formation supprimée.'
    ]);
}
    
    }
}