<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Api\TodoController;

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

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/todo', [TodoController::class, 'store']);
    Route::put('/todo/{id}', [TodoController::class, 'update']);
    Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
    Route::get('/todos', [TodoController::class, 'index']);
    Route::post('/markDone', [TodoController::class, 'markDone']);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        return Response::json(['success'=>true, 'user' => Auth::user()]);
    }

    return Response::json([
        'message' => 'The provided credentials does not match'
    ], 422);
});
