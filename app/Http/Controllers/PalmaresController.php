<?php

namespace App\Http\Controllers;
use App\Models\Palmares;
use Illuminate\Http\Request;

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
    $request->validate([
        'titre' => 'required',
        'sous_titre' => 'required',
        'valeur' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    $palmares = Palmares::create($request->only('titre', 'sous_titre', 'valeur'));

    if ($request->hasFile('image')) {
        $palmares->addMediaFromRequest('image')->toMediaCollection('images');
    }

    return redirect()->route('palmares.index');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'valeur' => 'required|integer',
            'titre' => 'required|string|max:255',
            'sous_titre' => 'required|string|max:255',
        ]);



        $palmares = Palmares::findOrFail($id);
        $palmares->update($request->all());

        return redirect()->route('palmares.index')->with('success', 'Palmarès updated successfully.');
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
