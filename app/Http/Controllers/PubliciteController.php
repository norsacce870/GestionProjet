<?php

use App\Models\Publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PubliciteController extends Controller
{
    /**
     * Affiche les publicités de l'utilisateur connecté.
     */
    public function index()
    {
        $publicites = Publicite::where('user_id', Auth::id())->get();
        return view('publicites.index', compact('publicites'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('publicites.create');
    }

    /**
     * Enregistre une nouvelle publicité.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Publicite::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('publicites.index')->with('success', 'Publicité ajoutée avec succès !');
    }

    /**
     * Affiche une publicité spécifique.
     */
    public function show(Publicite $publicite)
    {
        $this->authorize('view', $publicite);
        return view('publicites.show', compact('publicite'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Publicite $publicite)
    {
        $this->authorize('update', $publicite);
        return view('publicites.edit', compact('publicite'));
    }

    /**
     * Met à jour une publicité.
     */
    public function update(Request $request, Publicite $publicite)
    {
        $this->authorize('update', $publicite);

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $publicite->update($request->all());

        return redirect()->route('publicites.index')->with('success', 'Publicité mise à jour avec succès !');
    }

    /**
     * Supprime une publicité.
     */
    public function destroy(Publicite $publicite)
    {
        $this->authorize('delete', $publicite);
        $publicite->delete();
        return redirect()->route('publicites.index')->with('success', 'Publicité supprimée avec succès !');
    }
}
