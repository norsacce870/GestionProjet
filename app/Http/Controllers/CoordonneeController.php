<?php

namespace App\Http\Controllers;

use App\Models\Coordonnee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoordonneeController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $coordonnees = Coordonnee::orderBy('created_at', 'desc')->get();
        return view('coordonnee.index', compact('coordonnees'));
    }
    public function create()
{

    return view('coordonnee.create'); // ou un autre nom de vue si nécessaire
}


    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'nullable|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('icone')) {
            $path = $request->file('icone')->store('icones', 'public');
            $validated['icone'] = $path;
        }

        $coordonnee = Coordonnee::create($validated);
        $request->session()->flash('success', 'Coordonnée enregistrée avec succès.');
        return redirect()->route('coordonnee.index');
    }

    // Display the specified resource.
    public function show($id)
    {
        $coordonnee = Coordonnee::findOrFail($id);
        return redirect()->route('coordonnee.show', $coordonnee->id);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $coordonnee = Coordonnee::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'nullable|string|max:255',
            'icone' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('icone')) {
            // Optionally delete old image
            if ($coordonnee->icone && Storage::disk('public')->exists($coordonnee->icone)) {
                Storage::disk('public')->delete($coordonnee->icone);
            }
            $path = $request->file('icone')->store('icones', 'public');
            $validated['icone'] = $path;
        }

        $coordonnee->update($validated);
        return redirect()->route('coordonnee.show', $coordonnee->id);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $coordonnee = Coordonnee::findOrFail($id);
        // Optionally delete image file
        if ($coordonnee->icone && Storage::disk('public')->exists($coordonnee->icone)) {
            Storage::disk('public')->delete($coordonnee->icone);
        }
        $coordonnee->delete();
        return redirect()->route('coordonnee.index')->with('success', 'Coordonnée supprimée avec succès.');
    }
}
