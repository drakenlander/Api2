<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PdfController;
use Illuminate\Http\Request;
//use PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('games', GameController::class);
Route::get('generate-pdf', [PdfController::class, 'generatePDF']);
