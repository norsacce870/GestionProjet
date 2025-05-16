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
        $publicites = Publicite::where('user_id', Auth::id())->get();
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
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lien' => 'nullable|url',
        ]);

        Publicite::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'lien' => $request->lien,
            //'user_id' => Auth::id(),
        ]);

        return redirect()->route('publicite.index')->with('success', 'Publicité ajoutée avec succès !');
    }

    /**
     * Affiche une publicité spécifique.
     */
    public function show(Publicite $publicite)
    {
        return view('publicite.show', compact('publicite'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Publicite $publicite)
    {
        return view('publicite.edit', compact('publicite'));
    }

    /**
     * Met à jour une publicité.
     */
    public function update(Request $request, Publicite $publicite)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lien' => 'nullable|url',
        ]);

        $publicite->update($request->all());

        return redirect()->route('publicite.index')->with('success', 'Publicité mise à jour avec succès !');
    }

    /**
     * Supprime une publicité.
     */
    public function destroy(Publicite $publicite)
    {
        $publicite->delete();
        return redirect()->route('publicite.index')->with('success', 'Publicité supprimée avec succès !');
    }
}
