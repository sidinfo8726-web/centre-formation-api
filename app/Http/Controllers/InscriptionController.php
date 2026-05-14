<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    // Liste des inscriptions
    public function index()
    {
        return Inscription::with('etudiant', 'formation')->get();
    }

    // Ajouter inscription
    public function store(Request $request)
    {
        $inscription = Inscription::create([
            'etudiant_id' => $request->etudiant_id,
            'formation_id' => $request->formation_id,
            'date_inscription' => $request->date_inscription,
        ]);

        return response()->json($inscription, 201);
    }

    // Modifier inscription
    public function update(Request $request, $id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->update($request->all());

        return response()->json($inscription);
    }

    // Supprimer inscription
    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->delete();

        return response()->json([
            'message' => 'Inscription supprimée'
        ]);
    }
}