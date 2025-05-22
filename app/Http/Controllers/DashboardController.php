<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Player;
use App\Models\Publicite;
use App\Models\Palmares;
use Spatie\Activitylog\Models\Activity;
use App\Models\Actualite;




class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $videoCount = Video::count();
        $playerCount = Player::count();
        $pubCount = Publicite::count();
        $palmaresCount = Palmares::count();
        $recentActivities = Activity::latest()->take(5)->get();
        $palmares = Palmares::orderBy('created_at', 'desc')->take(5)->get();
        $latestNews = Actualite::orderBy('created_at', 'desc')->take(5)->get();
        $lastLogins = Activity::where('description', 'Connexion')
            ->with('causer') // causer = user
            ->latest()
            ->take(5)
            ->get();
        $lastActivities = Activity::whereIn('description', ['Connexion', 'Déconnexion'])
            ->with('causer')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'dashboard',
            [
                'recentActivities' => $recentActivities,
                // ... tes autres données (userCount, videoCount, etc.)
            ],
            compact(
                'userCount',
                'videoCount',
                'playerCount',
                'pubCount',
                'palmaresCount',
                'palmares',
                'latestNews',
                'lastLogins',
                'lastActivities',

            )
        );
    }
}


