<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\User;
use Illuminate\Database\Seeder;

class GameTopScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = Game::all();
        $users = User::all();
        foreach ($games as $game) {
            foreach ($users as $user) {
                $game_top_score = GameTopScore::factory()
                    ->for($user)
                    ->for($game)
                    ->create();
                $user->gameTopScores()->save($game_top_score);
                $game->gameTopScores()->save($game_top_score);
            }
        }
    }
}
