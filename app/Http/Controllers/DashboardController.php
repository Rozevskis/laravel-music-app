<?php

namespace App\Http\Controllers;


use App\Models\Playlist;
use App\Models\Song;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        
        $playlists = Playlist::query()
        ->with('songs') // Eager load songs to avoid N+1 problem
        ->where('created_by', $user->id)
        ->orderBy('id', 'desc')
        ->paginate(15);


        // $songs = Song::all();
        $songs = $playlists->isEmpty() ? collect() : $playlists->first()->songs;
        

        
        $user = auth()->user(); 
        
        return view('dashboard',  
        compact('user'), 
        ['playlists' => $playlists], 
        ['songs' => $songs]
    );


    }
}
