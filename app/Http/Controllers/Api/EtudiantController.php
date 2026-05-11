<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return Etudiant::all();
    }

    public function store(Request $request)
    {
        return Etudiant::create($request->all());
    }

    public function show($id)
    {
        return Etudiant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return $etudiant;
    }

    public function destroy($id)
    {
        Etudiant::destroy($id);
        return response()->json(['message' => 'Supprimé']);
    }
}