<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::latest()->get();

        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duree' => 'required|string|max:100',
        ]);

        Filiere::create($validated);

        return redirect()->route('filieres.index')
            ->with('success', 'Filière ajoutée avec succès.');
    }

    public function show(Filiere $filiere)
    {
        return view('filieres.show', compact('filiere'));
    }

    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    public function update(Request $request, Filiere $filiere)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

        $filiere->nom = $request->nom;
        $filiere->description = $request->description;
        $filiere->save();

    return redirect()
        ->route('filieres.index')
        ->with('success', 'Filière modifiée avec succès.');
}

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();

        return redirect()->route('filieres.index')
            ->with('success', 'Filière supprimée avec succès.');
    }
}
