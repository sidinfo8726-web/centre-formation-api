<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        return response()->json(
            Formation::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric'
        ]);

        $formation = Formation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix
        ]);

        return response()->json([
            'message' => 'Formation créée avec succès',
            'data' => $formation
        ], 201);
    }

    public function show($id)
    {
        return response()->json(
            Formation::findOrFail($id)
        );
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $formation->update($request->only([
            'titre',
            'description',
            'prix'
        ]));

        return response()->json([
            'message' => 'Formation mise à jour',
            'data' => $formation
        ]);
    }

    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);

        $formation->delete();

        return response()->json([
            'message' => 'Formation supprimée'
        ]);
    }
}