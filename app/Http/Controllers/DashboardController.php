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
        
        return view('dashboard',  compact('user'));


    }
}
