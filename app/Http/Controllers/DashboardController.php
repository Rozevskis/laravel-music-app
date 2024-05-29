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
        // $songs = Song::query()
        // ->orderBy('title', 'desc')
        // // ->paginate()
        // ;
        $songs = Song::all();
        $playlists = Playlist::query()
        ->orderBy('id', 'desc')
        ->paginate(15)
        ->where('created_by', request()->user()->id);

        $user = auth()->user(); 
        
        return view('dashboard',  
        compact('user'), 
        ['playlists' => $playlists], 
        ['songs' => $songs]
    );


    }
}
