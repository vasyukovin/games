<?php

namespace App\Services;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Genre;

class GameService
{
    public static function getGamesWithGenres(): bool|string
    {
        return Game::query()
            ->with('genres:id,name')
            ->get(['id', 'name', 'description']);
    }

    public static function getGameWithGenres(int $id): bool|string
    {
        return Game::query()
            ->with('genres:id,name')
            ->where('games.id', $id)
            ->first(['id', 'name', 'description']);
    }

    public static function createGameWithGenres(GameRequest $request): void
    {
        $game = Game::create($request->safe()->only(['name', 'description']));

        foreach ($request->genres as $genre) {
            $game->genres()->attach(Genre::where('name', $genre)->first());
        }
    }

    public static function updateGameWithGenres(GameRequest $request, Game $game): void
    {
        $game->update($request->safe()->only(['name', 'description']));

        $game->genres()->sync(Genre::query()->whereIn('name', $request->genres)->get());
    }

}
