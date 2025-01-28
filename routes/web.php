<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

/** Главная */
Route::get('/', [IndexController::class, 'index'])->name('index');

/** Личный кабинет пользователя. Регистрация, вход, восстановление пароля */	
Route::group([
	'as' => 'user.',
	'prefix' => 'user'
], function (){
		Auth::routes();
		Route::get('/', [UserController::class, 'index'])->name('index');
		Route::get('/id/{user}', [UserController::class, 'user'])->name('user');
		Route::post('/add', [UserController::class, 'bonusesAdd'])->name('bonusesAdd');
		Route::post('/writeoff', [UserController::class, 'bonusesWriteOff'])->name('bonusesWriteOff');
});
