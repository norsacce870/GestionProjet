<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Player;
use App\Models\Publicite;
use App\Models\Palmares;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $videoCount = Video::count();
        $playerCount = Player::count();
        $pubCount = Publicite::count();
        $palmaresCount = Palmares::count();

        return view('dashboard', compact(
            'userCount',
            'videoCount',
            'playerCount',
            'pubCount',
            'palmaresCount'
        ));
    }
}


