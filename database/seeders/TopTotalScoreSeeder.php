<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\TopTotalScore;
use App\Models\User;
use Illuminate\Database\Seeder;

class TopTotalScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $top_total_score = TopTotalScore::factory()
                ->for($user)
                ->create();
            $user->topTotalScore()->save($top_total_score);
        }
    }
}
