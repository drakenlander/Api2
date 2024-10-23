<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$games = Game::select('title as Título', 'genre as Género', 'developer as Desarrollador',
        //'publisher as Editor', 'release_date as Fecha de Salida')->orderBy('release_date')->get();
        //return response()->json(['status' => 'success', 'data' => $games]);
        $games = Game::all();
        return view('dashboard', compact('games'));
    }

    public function store(Request $request)
    {
        try {
            $game = Game::create($request->all());
            return response()->json(['status' => 'success',
            'message' => 'Registro creado exitosamente.', 'data' => $game]);
        } catch(\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'No se pudo crear el registro.']);
        }
    }

    public function show(string $value)
    {
        try {
            $game = Game::where('id', $value)->orWhere('title', $value)->orWhere('developer', $value)->firstOrFail();
            return response()->json(['status' => 'success',
            'message' => 'Se está mostrando el registro.', 'data' => $game]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit(Game $game)
    {
        $this->authorize('update', $game);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $game = Game::findOrFail($id);

            if ($request->user()->cannot('update', $game)) {
                abort(403); 
            }

            $game->update($request->all());
            //return response()->json(['status' => 'success', 'message' => 'Producto actualizado exitosamente.',
            //'data' => $game]);
            return redirect()->route('dashboard')->with('success', 'Game updated successfully');
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Game $game)
    {
        $this->authorize('delete', $game);

        try {
            $game->delete();
            //return response()->json(['status' => 'success', 'message' => 'Producto eliminado exitosamente.',
            //'data' => $game]);
            return redirect()->route('dashboard')->with('success', 'Game deleted successfully');
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
