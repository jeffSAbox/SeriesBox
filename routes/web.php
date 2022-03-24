<?php

use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Models\Episodio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/docLaravel', function () {
    return view('welcome');
});

//  SERIES
Route::get('/', [SeriesController::class, "index"])
    ->name("listar_series");    // index
Route::get("/serie/adicionar", [SeriesController::class, 'create'])
    ->name("form_criar_serie"); // form create
Route::post("/serie/adicionar", [SeriesController::class, 'store']); // salvar form create
Route::delete("/serie/{id_serie}", [SeriesController::class, 'destroy']); // deletar serie
Route::post('/serie/{id}/editarNome', [SeriesController::class, 'editarNome']);

//  TEMPORADAS
Route::get('/serie/{serieId}/temporadas', [TemporadasController::class, 'index']);

//  EPISODIOS
Route::get('/temporada/{temporada}/episodios', [EpisodiosController::class, 'index']);
Route::post('/temporada/{temporada}/episodios/assistir', [EpisodiosController::class, 'assistir']);

//  LOGIN
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'fazerLogin']);