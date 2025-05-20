<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    // Affiche toutes les actualités
    public function index()
    {
        $actualites = Actualite::all();
        return view('actualites.index', compact('actualites'));
    }

    // Formulaire de création
    public function create()
    {
        return view('actualites.create');
    }

    // Enregistre une nouvelle actualité
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        Actualite::create($request->all());

        return redirect()->route('actualites.index')->with('success', 'Actualité ajoutée avec succès.');
    }

    // Formulaire d'édition
    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('actualites.edit', compact('actualite'));
    }

    // Mise à jour de l'actualité
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        $actualite = Actualite::findOrFail($id);
        $actualite->update($request->all());

        return redirect()->route('actualites.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    // Suppression
    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);
        $actualite->delete();

        return redirect()->route('actualites.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
