<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    // Liste des inscriptions
    public function index()
    {
        return response()->json(
            Inscription::with('formation')->get()
        );
    }

    // Ajouter une inscription
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'formation_id' => 'required|exists:formations,id',
            'date_inscription' => 'required|date',
        ]);

        $inscription = Inscription::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'formation_id' => $request->formation_id,
            'date_inscription' => $request->date_inscription,
        ]);

        return response()->json([
            'message' => 'Inscription créée avec succès',
            'data' => $inscription
        ], 201);
    }

    // Afficher une inscription
    public function show($id)
    {
        return response()->json(
            Inscription::with('formation')->findOrFail($id)
        );
    }

    // Modifier une inscription
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'formation_id' => 'required|exists:formations,id',
            'date_inscription' => 'required|date',
        ]);

        $inscription = Inscription::findOrFail($id);

        $inscription->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'formation_id' => $request->formation_id,
            'date_inscription' => $request->date_inscription,
        ]);

        return response()->json([
            'message' => 'Inscription mise à jour',
            'data' => $inscription
        ]);
    }

    // Supprimer une inscription
    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->delete();

        return response()->json([
            'message' => 'Inscription supprimée'
        ]);
    }
}