<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
        return response()->json(
            Paiement::with('inscription')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'inscription_id' => 'required|exists:inscriptions,id',
            'montant' => 'required|numeric',
            'statut' => 'required|string',
            'date_paiement' => 'required|date',
        ]);

        $paiement = Paiement::create([
            'inscription_id' => $request->inscription_id,
            'montant' => $request->montant,
            'statut' => $request->statut,
            'date_paiement' => $request->date_paiement,
        ]);

        return response()->json($paiement, 201);
    }

    public function show($id)
    {
        $paiement = Paiement::with('inscription')->findOrFail($id);

        return response()->json($paiement);
    }

    public function update(Request $request, $id)
    {
        $paiement = Paiement::findOrFail($id);

        $request->validate([
            'inscription_id' => 'required|exists:inscriptions,id',
            'montant' => 'required|numeric',
            'statut' => 'required|string',
            'date_paiement' => 'required|date',
        ]);

        $paiement->update([
            'inscription_id' => $request->inscription_id,
            'montant' => $request->montant,
            'statut' => $request->statut,
            'date_paiement' => $request->date_paiement,
        ]);

        return response()->json([
            'message' => 'Paiement mis à jour',
            'data' => $paiement
        ]);
    }

    public function destroy($id)
    {
        Paiement::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Paiement supprimé'
        ]);
    }
}