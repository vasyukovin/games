<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class GameController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return bool|string
     */
    public function index(): bool|string
    {
        return response(GameService::getGamesWithGenres());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameRequest $request
     * @return Response
     */
    public function store(GameRequest $request): Response
    {
        GameService::createGameWithGenres($request);

        return response('Игра добавлена', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return bool|string
     */
    public function show(int $id): bool|string
    {
        return response(GameService::getGameWithGenres($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GameRequest $request
     * @param Game $game
     * @return Response
     */
    public function update(GameRequest $request, Game $game): Response
    {
        GameService::updateGameWithGenres($request, $game);

        return response('Игра обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game): Response
    {
        $game->delete();

        return response('Игра удалена');
    }
}
