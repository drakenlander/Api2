<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::select('title as Título', 'genre as Género', 'developer as Desarrollador',
        'publisher as Editor', 'release_date as Fecha de Salida')->orderBy('release_date')->get();
        return response()->json(['status' => 'success', 'data' => $games]);
    }
}
