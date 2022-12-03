<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentification\AuthentificationController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Users\UsersController;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('login', [AuthentificationController::class, 'login']);
// Route::post('register', [AuthentificationController::class, 'register']);
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('get-details', [AuthentificationController::class, 'getDetails']);
// });

// Route::get('/news', [NewsController::class, 'index']);
