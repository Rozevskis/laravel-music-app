<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        // Generate 100 songs
        Song::factory()->count(100)->create();

        // Generate 100 playlists
        Playlist::factory()->count(100)->create();

        // Optionally, you can attach songs to playlists
        $playlists = Playlist::all();
        $songs = Song::all();

        // Attach each song to 1-5 random playlists
        $songs->each(function ($song) use ($playlists) {
            $playlistsToAttach = $playlists->random(rand(1, 5))->pluck('id')->toArray();
            $song->playlists()->attach($playlistsToAttach);
        });
    }
}
