<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('projects', [ProjectController::class, 'index']);

// rotta per trovare un progetto singolo con chiamata axios
Route::get('project/{project}',[ProjectController::class, 'show']);

/// rotta per il form di contatcs(dove inviare i dati)
Route::post('/contacts',[LeadController::class, 'store']);