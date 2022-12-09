<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () { return view('top'); });

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/create', [MenuController::class, 'createPost'])->name('menu.create');
    Route::post('/menu/create/confirm', [MenuController::class, 'createConfirm'])->name('menu.create.confirm');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/{id}/edit', [MenuController::class, 'editPost'])->name('menu.edit');
    Route::post('/menu/{id}/edit/confirm/', [MenuController::class, 'editConfirm'])->name('menu.edit.confirm');
    Route::post('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

Auth::routes([
    'register' => false,    //ユーザ登録画面の無効
    'reset' => false,       //パスワードリセットの無効
]);
