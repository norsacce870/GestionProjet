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
        // Récupération des joueurs groupés par poste avec comptage
        $postes = Player::select('poste', \DB::raw('count(*) as total'))
            ->groupBy('poste')
            ->get();

        // Calcul du total de joueurs
        $total = $postes->sum('total');

        // On convertit en format exploitable en vue
        $repartition = $postes->mapWithKeys(function ($item) use ($total) {
            $pourcentage = $total > 0 ? round(($item->total / $total) * 100) : 0;
            return [$item->poste => $pourcentage];
        });

        return view(
            'dashboard',
            [
                'recentActivities' => $recentActivities,
                'repartition' => $repartition,
                'total' => $total,
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


