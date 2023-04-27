<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatUserController;
use App\Http\Controllers\MessageController;

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

Route::get('/users', [ChatUserController::class, 'getUsers']);
Route::post('/users', [ChatUserController::class, 'postUser']);
Route::get('/users/{id}', [ChatUserController::class, 'getUsersById']);
Route::post('/users/login', [ChatUserController::class, 'userLogin']);


// Route::post('/ext/setMessage',[MessageController::class,'setMessage']);
// Route::get('/ext/getMessage',[MessageController::class,'getMessage']);
// Route::get('/ext/getMessage/{searchId}', [MessageController::class, 'getMessageById']);
//Route::update('/ext/putMessage',[PageController::class,'putMessage']);
//Route::delete('/ext/deleteMessage',[PageController::class,'deleteMessage']);


Route::get('/messages', [MessageController::class, 'getMessage']);
Route::get('/messages/{id}', [MessageController::class, 'getMessagesById']);
Route::get('/messages/users/{user_one_id}&&{user_two_id}', [MessageController::class, 'getRecentMessages']) //gonna be the third controller 
->withoutMiddleware('throttle:api')
    ->middleware('throttle:500:1');
Route::post('/messages', [MessageController::class, 'postMessage']);

//comment messages out if you need to to test the users

