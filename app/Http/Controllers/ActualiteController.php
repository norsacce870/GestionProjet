<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    // Affiche toutes les actualités avec pagination et tri décroissant
    public function index()
    {
        $actualites = Actualite::orderBy('created_at', 'desc')->paginate(10);
        return view('actualite.index', compact('actualites'));
    }

    // Formulaire de création
    public function create()
    {
        return view('actualite.create');
    }

    // Enregistre une nouvelle actualité
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'contenu' => 'required|string', // ici tu peux modifier si contenu sert pour l’image
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        /* if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/actualites', $imageName);
            // Stocke le nom du fichier dans "contenu"
            $data['contenu'] = $imageName;
        } */

        $actualite = Actualite::create($data);

        if ($request->hasFile('image')) {
            $actualite->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('actualite.index')->with('success', 'Actualité ajoutée avec succès.');
    }

    // Affiche le détail d'une actualité
    public function show($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('actualite.show', compact('actualite'));
    }

    // Formulaire d'édition
    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('actualite.edit', compact('actualite'));
    }

    // Mise à jour de l'actualité
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $actualite = Actualite::findOrFail($id);
        $data = $request->all();

        /* if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/actualites', $imageName);
            // Stocke le nom du fichier dans "contenu"
            $data['contenu'] = $imageName;
        } */

        $actualite->update($data);

        if ($request->hasFile('image')) {
            $actualite->clearMediaCollection('images');
            $actualite->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('actualite.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    // Suppression
    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);
        $actualite->delete();

        return redirect()->route('actualite.index')->with('success', 'Actualité supprimée avec succès.');
    }

    
}
