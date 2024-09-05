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

    public function store(Request $request)
    {
        try {
            $Game = Game::create($request->all());
            return response()->json(['status' => 'success',
            'message' => 'Registro creado exitosamente.', 'data' => $Game]);
            //$Game = new Game();
            //$Game->cif = $request->cif;
            //$Game->first_name = $request->first_name;
            //$Game->last_name = $request->last_name;
            //$Game->email = $request->email;
            //$Game->career = $request->career;
            //$Game->grade = $request->grade;
        } catch(\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'No se pudo crear el registro.']);
        }
    }

    public function show(string $id)
    {
        try {
            $Game = Game::findOrFail($id);
            return response()->json(['status' => 'success',
            'message' => 'Se está mostrando el registro', 'data' => $Game]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
