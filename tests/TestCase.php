<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;
use App\Models\Game;

abstract class TestCase extends BaseTestCase
{
    public function user($factory): void
    {
        /** @var User $user */
        $user = User::factory()
            ->has($factory)
            ->createOne();
        $model = $factory->for($user)->createOne();

        $this->assertInstanceOf(
            User::class,
            $model->user,
        );
        $this->assertEquals(
            $model->user_id,
            $user->id,
        );
    }

    public function game($factory): void
    {
        /** @var Game $game */
        $game = Game::factory()
            ->has($factory)
            ->createOne();
        $model = $factory->for($game)->createOne();

        $this->assertInstanceOf(
            Game::class,
            $model->game,
        );
        $this->assertEquals(
            $model->game_id,
            $game->id,
        );
    }
}
