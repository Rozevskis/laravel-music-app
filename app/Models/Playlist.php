<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'created_by'];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'playlist_song');
    }
}
