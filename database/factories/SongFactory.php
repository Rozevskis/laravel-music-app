<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;


class SongFactory extends Factory
{
    protected $model = Song::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // Generates a random title
            'artist' => $this->faker->name, // Generates a random artist name
        ];
    }
}

