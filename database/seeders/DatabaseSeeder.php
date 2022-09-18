<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Game::factory()
            ->count(7)
            ->has(Genre::factory()->count(1))
            ->create();
    }
}
