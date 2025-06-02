<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actualite; // modèle bien importé

class ActualitesController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->get();
        return view('public.actualites', compact('actualites'));
    }
}
