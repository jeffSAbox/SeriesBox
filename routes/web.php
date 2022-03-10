<?php

use App\Http\Controllers\SeriesController;
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

Route::get('/', [SeriesController::class, "index"]);

Route::get("/serie/adicionar", [SeriesController::class, 'create']);
Route::post("/serie/adicionar", [SeriesController::class, 'store']);
