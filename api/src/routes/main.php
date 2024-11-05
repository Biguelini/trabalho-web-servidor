<?php


use Illuminate\Support\Facades\Route;

use App\Controllers\LoginController;
use App\Controllers\PerfilController;
use App\Controllers\RegisterController;

Route::group(['prefix' => 'api'], function () {

	Route::group(['prefix' => 'login'], function () {
		Route::post('/', [LoginController::class, 'login']);
	});

	Route::group(['prefix' => 'register'], function () {
		Route::post('/', [RegisterController::class, 'register']);
	});

	Route::group(['prefix' => 'perfil'], function () {
		Route::get('/{id}', [PerfilController::class, 'get']);
		Route::put('/{id}', [PerfilController::class, 'update']);
	});
	
});
