<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'lien' => ['nullable', 'url'],
        ]);

        Video::create([
            'titre' => $request->titre,
            'lien' => $request->lien,
            'user_id' => Auth::id(),
        ]);


        $request->session()->flash('success', 'Vidéo enregistrée avec succès.');
        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
         return view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
         return view('video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
         $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'lien' => ['nullable', 'url'],
        ]);

        $data = $request->only(['titre','lien']);
        $video->update($data);

        $request->session()->flash('succes', 'Viédeo mise à jour avec succès.');
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
         $video->delete();
        session()->flash('succes', 'Vidéo supprimée avec succès.');
        return redirect()->route('video.index');
    }
}
