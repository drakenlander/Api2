<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $gameController = new GameController();
        $response = $gameController->index();
        $responseData = json_decode($response->getContent(), true);

        if (!isset($responseData['data']) || !is_array($responseData['data'])) {
            return response()->json(['error' => 'Invalid product data...'], 500);
        }

        $games = $responseData['data'];

        $data = [
            'title' => 'Lista de Estudiantes',
            'games' => $games
        ];

        $pdf = PDF::loadView('pdf.document', $data);

        return $pdf->download('document.pdf');
    }
}
