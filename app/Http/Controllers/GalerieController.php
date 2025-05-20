<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerie;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeries = Galerie::all();
        return view('galerie.index', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galerie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_event' => 'required|string|max:255',
            'description_event' => 'nullable|string',
            'photo_couv' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Création de l'événement
        $galerie = Galerie::create([
            'nom_event' => $request->nom_event,
            'description_event' => $request->description_event,
        ]);

        // Ajout de la photo de couverture (tag "cover")
        $galerie->addMediaFromRequest('photo_couv')
            ->toMediaCollection('cover');

        // Ajout des photos multiples de l'évènement (tag "photos")
        if ($request->hasFile('photos')) {
            $galerie->addMultipleMediaFromRequest(['photos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('photos');
                });
        }

        return redirect()->route('galerie.index')->with('success', 'Évènement ajouté avec ses photos.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galerie $galerie)
    {
        return view('galerie.show', [
            'galerie' => $galerie,
            'photo_couv' => $galerie->getFirstMediaUrl('cover'),
            'photos' => $galerie->getMedia('photos'),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galerie $galerie)
    {
        return view('galerie.edit', compact('galerie'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galerie $galerie)
    {
        $request->validate([
            'nom_event' => 'required|string|max:255',
            'description_event' => 'nullable|string',
            'photo_couv' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galerie->update([
            'nom_event' => $request->nom_event,
            'description_event' => $request->description_event,
        ]);

        if ($request->hasFile('photo_couv')) {
            $galerie->clearMediaCollection('cover');
        $galerie->addMediaFromRequest('photo_couv')->toMediaCollection('cover');
        }

        if ($request->hasFile('photos')) {
            $galerie->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }

        return redirect()->route('galerie.index')->with('success', 'Événement mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galerie $galerie)
    {
        $galerie->clearMediaCollection('photo_couv');
        $galerie->clearMediaCollection('photos');
        $galerie->delete();

        return redirect()->route('galerie.index')->with('success', 'Événement supprimé avec succès.');
    }
}
