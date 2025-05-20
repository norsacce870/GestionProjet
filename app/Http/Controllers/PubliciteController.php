<?php

namespace App\Http\Controllers;

use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PubliciteController extends Controller
{
    /**
     * Affiche la liste des publicités.
     */
    public function index()
    {
        $publicites = Publicite::orderBy('created_at', 'desc')->get();
        return view('publicite.index', compact('publicites'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('publicite.create');
    }

    /**
     * Enregistre une nouvelle publicité.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lien' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $publicite = Publicite::create([
            'nom' => $validated['nom'],
            'description' => $validated['description'],
            'lien' => $validated['lien'] ?? null,
            'user_id' => Auth::id(),
        ]);

        // Vérification et stockage de l'image
        if ($request->hasFile('image')) {
            $publicite->addMediaFromRequest('image')->toMediaCollection('image');
        }

        // Vérification post-enregistrement
        $mediaCount = $publicite->getMedia('image')->count();
        if ($mediaCount === 0) {
            return back()->withErrors(['image' => 'L’image n’a pas été enregistrée correctement.']);
        }

        return redirect()->route('publicite.index')->with('success', 'Publicité ajoutée avec succès.');
    }

    /**
     * Affiche une publicité spécifique.
     */
    public function show($id)
    {
        $publicite = Publicite::findOrFail($id);
        return view('publicite.show', compact('publicite'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit($id)
    {
        $publicite = Publicite::findOrFail($id);
        return view('publicite.edit', compact('publicite'));
    }

    /**
     * Met à jour une publicité.
     */
    public function update(Request $request, $id)
    {
        $publicite = Publicite::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lien' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $publicite->update($validated);

        if ($request->hasFile('image')) {
            $publicite->clearMediaCollection('image'); // Supprime l'ancienne image
            $publicite->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()->route('publicite.index')->with('success', 'Publicité mise à jour avec succès.');
    }

    /**
     * Supprime une publicité.
     */
    public function destroy($id)
    {
        $publicite = Publicite::findOrFail($id);
        $publicite->delete();

        return redirect()->route('publicite.index')->with('success', 'Publicité supprimée avec succès.');
    }
}
