<?php

use App\Http\Controllers\Authentification\AuthentificationController; //Controlador de Autentificación de usuarios
use Illuminate\Support\Facades\Route; //Facade de rutas
use App\Http\Controllers\News\NewsController; //Controlador para el CRUD de notcias
use App\Http\Controllers\Plataform\PlataformNewsController; //Controlador de la plataforma

/*Home Principal*/

Route::get('/', [AuthentificationController::class, 'index']);

/*Authentification*/
Route::get('recording', [AuthentificationController::class, 'register'])->name('recording');
Route::post('save-recording', [AuthentificationController::class, 'saveRecording'])->name('save.recording');
Route::get('access', [AuthentificationController::class, 'login'])->name('access');

Auth::routes();

/*Plataform News*/
Route::get('/home', [PlataformNewsController::class, 'index'])->name('home');
Route::get('/news-detail/{id}', [PlataformNewsController::class, 'news'])->name('view.new');


/*Dashboard*/
Route::get('/new-list', [NewsController::class, 'index'])->name('new.list');

/*CRUD News*/
Route::resource('news', NewsController::class);
