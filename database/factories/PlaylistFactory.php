<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    protected $model = Playlist::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'created_by' => '1',
        ];
    }
}
