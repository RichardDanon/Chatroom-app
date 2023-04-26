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

Route::post('/ext/setChatUser',[ChatUserController::class,'setChatUser']);
Route::get('/ext/getChatUser',[ChatUserController::class,'getChatUser']);
Route::put('/ext/putChatUser',[ChatUserController::class,'putChatUser']);
Route::delete('/ext/deleteChatUser',[ChatUserController::class,'deleteChatUser']);


Route::post('/ext/setMessage',[MessageController::class,'setMessage']);
Route::get('/ext/getMessage',[MessageController::class,'getMessage']);
Route::get('/ext/getMessage/{searchId}', [MessageController::class, 'getMessageById']);
//Route::update('/ext/putMessage',[PageController::class,'putMessage']);
//Route::delete('/ext/deleteMessage',[PageController::class,'deleteMessage']);


