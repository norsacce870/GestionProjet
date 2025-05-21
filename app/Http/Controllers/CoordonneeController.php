<?php

namespace App\Http\Controllers;

use App\Models\Coordonnee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class CoordonneeController extends Controller
{
    // Display a listing of the resource.
   public function index()
{
    $coordonnees = Coordonnee::orderBy('created_at', 'desc')->paginate(10); // 10 coordonnées par page
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
        'icone' => 'nullable|string|max:255', // Accept icon class name
    ]);

    $validated['user_id'] = Auth::id();

    $coordonnee = Coordonnee::create($validated);
    $request->session()->flash('success', 'Coordonnée enregistrée avec succès.');
    return redirect()->route('coordonnee.index');
}

    // Display the specified resource.
    public function show($id)
    {
        $coordonnee = Coordonnee::findOrFail($id);
        return view('coordonnee.show', compact('coordonnee'));
    }
    public function edit($id)
{
    $coordonnee = Coordonnee::findOrFail($id);
    return view('coordonnee.edit', compact('coordonnee'));
}

    // Update the specified resource in storage.
 public function update(Request $request, $id)
{
    $coordonnee = Coordonnee::findOrFail($id);

    $validated = $request->validate([
        'nom' => 'nullable|string|max:255',
        'icone' => 'nullable|string|max:255',
    ]);

    $validated['user_id'] = Auth::id();

    $coordonnee->update($validated);
    return redirect()->route('coordonnee.index')->with('success', 'Coordonnée mise à jour avec succès.');
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
