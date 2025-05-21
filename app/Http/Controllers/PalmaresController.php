<?php

namespace App\Http\Controllers;
use App\Models\Palmares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PalmaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {   $palmares = Palmares::orderBy('created_at', 'desc')->paginate(10);
        return view('palmares.index', compact('palmares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('palmares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'valeur' => 'required|numeric',
        'titre' => 'required|string|max:255',
        'sous-titre' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
    ]);

    // Enregistrement
    Palmares::create([
        'valeur' => $request->valeur,
        'titre' => $request->titre,
        'sous_titre' => $request->input('sous-titre'), // le champ HTML est 'sous-titre'
        'image' => $request->file('image')->store('palmares', 'public'), // Enregistrement de l'image
    ]);

    // Redirection vers l’index
    return redirect()->route('palmares.index')->with('success', 'Palmarès ajouté avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $palmares = Palmares::findOrFail($id);
        return view('palmares.show', compact('palmares'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $palmares = Palmares::findOrFail($id);
        return view('palmares.edit', compact('palmares'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $palmares = Palmares::findOrFail($id); // On récupère le modèle manuellement

    $data = $request->validate([
        'valeur' => 'required|integer',
        'titre' => 'required|string|max:255',
        'sous_titre' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Supprimer l’ancienne image si elle existe
        if ($palmares->image && Storage::exists('public/' . $palmares->image)) {
            Storage::delete('public/' . $palmares->image);
        }

        // Sauvegarder la nouvelle image
        $data['image'] = $request->file('image')->store('palmares', 'public');
    }

    $palmares->update($data); // Ceci fonctionnera car $palmares est bien un modèle

    return redirect()->route('palmares.index')->with('success', 'Palmarès mis à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $palmares = Palmares::findOrFail($id);
        $palmares->delete();

        return redirect()->route('palmares.index')->with('success', 'Palmarès deleted successfully.');
    }
}
