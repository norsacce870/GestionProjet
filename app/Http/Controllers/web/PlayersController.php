<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Player;

class PlayersController extends Controller
{
    public function index()
    {
        $coachs = Player::where('poste', 'Coach')->get();
        $attaquants = Player::where('poste', 'Attaquant')->get();
        $milieux = Player::where('poste', 'Milieu')->get();
        $defenseurs = Player::where('poste', 'Défenseur')->get();
        $gardiens = Player::where('poste', 'Gardien')->get();
        $videos = Video::orderBy('created_at', 'desc')->take(3)->get(); // Affiche 3 vidéos

        return view('web.effectif', compact('coachs', 'attaquants', 'milieux', 'defenseurs', 'gardiens' , 'videos'));
    }
}
