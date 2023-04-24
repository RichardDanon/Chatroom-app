<?php

use Illuminate\Http\Request;
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

Route::post('/ext/setChatUser',[PageController::class,'setChatUser']);
Route::get('/ext/getChatUser',[PageController::class,'getChatUser']);
Route::put('/ext/putChatUser',[PageController::class,'putChatUser']);
Route::delete('/ext/deleteChatUser',[PageController::class,'deleteChatUser']);


Route::post('/ext/setMessage',[PageController::class,'setMessage']);
Route::get('/ext/getMessage',[PageController::class,'getMessage']);
//Route::update('/ext/putMessage',[PageController::class,'putMessage']);
//Route::delete('/ext/deleteMessage',[PageController::class,'deleteMessage']);


