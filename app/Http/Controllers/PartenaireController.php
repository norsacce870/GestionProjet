<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partenaires = Partenaire::with('media')->get();
        return view('partenaire.index', compact('partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partenaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'media' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $partenaire = Partenaire::create([
            'nom' => $request->nom,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('media')) {
            $partenaire->addMediaFromRequest('media')->toMediaCollection();
        }

        $request->session()->flash('success', 'Partenaire enregistré avec succès.');
        return redirect()->route('partenaire.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
        return view('partenaire.show', compact('partenaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        return view('partenaire.edit', compact('partenaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'media' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $partenaire->update([
            'nom' => $request->nom,
        ]);

        if ($request->hasFile('media')) {
            $partenaire->clearMediaCollection(); // Supprime l'ancien média
            $partenaire->addMediaFromRequest('media')->toMediaCollection();
        }

        $request->session()->flash('success', 'Partenaire mis à jour avec succès.');
        return redirect()->route('partenaire.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        $partenaire->clearMediaCollection();
        $partenaire->delete();

        session()->flash('success', 'Partenaire supprimé avec succès.');
        return redirect()->route('partenaire.index');
    }
}
