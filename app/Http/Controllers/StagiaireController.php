<?php
namespace App\Http\Controllers;
 
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $stagiaires = Stagiaire::where('nom', 'like', '%' . $search . '%')
        ->orWhere('prenom', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->orWhere('telephone', 'like', '%' . $search . '%')
        ->latest()
        ->get();

    return view('stagiaires.index', compact('stagiaires', 'search'));
}

    public function create()
    {
        return view('stagiaires.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'nullable|string',
            'date_naissance' => 'nullable|date',
        ]);

        Stagiaire::create($validated);

        return redirect()->route('stagiaires.index')
            ->with('success', 'Stagiaire ajouté avec succès.');
    }

    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaires.show', compact('stagiaire'));
    }

    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', compact('stagiaire'));
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email,' . $stagiaire->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'nullable|string',
            'date_naissance' => 'nullable|date',
        ]);

        $stagiaire->update($validated);

        return redirect()->route('stagiaires.index')
            ->with('success', 'Stagiaire modifié avec succès.');
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')
            ->with('success', 'Stagiaire supprimé avec succès.');
    }
    
}
