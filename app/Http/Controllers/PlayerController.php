<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('players.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'nullable|string',
            'prenom' => 'nullable|string',
            'poste' => 'nullable|string',
            'numero' => 'nullable|integer',
            'naissance_at' => 'nullable|date',
            'poids' => 'nullable|numeric',
            'taille' => 'nullable|numeric',
            'club' => 'nullable|string',
            'valeur' => 'nullable|numeric',
            'fin_contrat_at' => 'nullable|date',
            'user_id' => 'nullable|exists:users,idUser',
        ]);

        Player::create($validated);

        return redirect()->route('players.index')->with('success', 'Joueur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $users = User::all();
        return view('players.edit', compact('player', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'nom' => 'nullable|string',
            'prenom' => 'nullable|string',
            'poste' => 'nullable|string',
            'numero' => 'nullable|integer',
            'naissance_at' => 'nullable|date',
            'poids' => 'nullable|numeric',
            'taille' => 'nullable|numeric',
            'club' => 'nullable|string',
            'valeur' => 'nullable|numeric',
            'fin_contrat_at' => 'nullable|date',
            'user_id' => 'nullable|exists:users,idUser',
        ]);

        $player->update($validated);

        return redirect()->route('players.index')->with('success', 'Joueur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Joueur supprimé avec succès.');
    }
}
