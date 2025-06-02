<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('created_at', 'desc')->paginate(10);
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $users = User::all();
        return view('players.create', compact('users'));
    }

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
            'image' => 'nullable|image|max:2048',
        ]);

        $player = Player::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'poste' => $validated['poste'],
            'numero' => $validated['numero'],
            'naissance_at' => $validated['naissance_at'],
            'poids' => $validated['poids'],
            'taille' => $validated['taille'],
            'club' => $validated['club'],
            'valeur' => $validated['valeur'],
            'fin_contrat_at' => $validated['fin_contrat_at'],
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $player->addMediaFromRequest('image')->toMediaCollection('players');
        }

        activity()
            ->causedBy(Auth::user())
            ->performedOn($player)
            ->withProperties(['nom' => $player->nom, 'prenom' => $player->prenom])
            ->log('Ajout d\'un joueur');

        return redirect()->route('players.index')->with('success', 'Joueur créé avec succès.');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $users = User::all();
        return view('players.edit', compact('player', 'users'));
    }

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
            'image' => 'nullable|image|max:2048',
        ]);

        $player->update($validated);

        if ($request->hasFile('image')) {
            $player->clearMediaCollection('players');
            $player->addMediaFromRequest('image')->toMediaCollection('players');
        }

        activity()
            ->causedBy(Auth::user())
            ->performedOn($player)
            ->withProperties(['nom' => $player->nom, 'prenom' => $player->prenom])
            ->log('Modification d\'un joueur');

        return redirect()->route('players.index')->with('success', 'Joueur modifié avec succès.');
    }

    public function destroy(Player $player)
    {
        $nom = $player->nom;
        $prenom = $player->prenom;

        $player->delete();

        activity()
            ->causedBy(Auth::user())
            ->withProperties(['nom' => $nom, 'prenom' => $prenom])
            ->log('Suppression d\'un joueur');

        return redirect()->route('players.index')->with('success', 'Joueur supprimé avec succès.');
    }
}
