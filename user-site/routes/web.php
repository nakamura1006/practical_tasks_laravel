<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about')->with(['bodyId' => 'about']); })->name('about');
Route::get('/access', function () { return view('access')->with(['bodyId' => 'access']); })->name('access');
Route::get('/contact', function () { return view('contact')->with(['bodyId' => 'contact']); })->name('contact');
Route::get('/counselor', function () { return view('counselor')->with(['bodyId' => 'counselor']); })->name('counselor');
Route::get('/link', function () { return view('link')->with(['bodyId' => 'link']); })->name('link');
Route::get('/menu', function () { return view('menu')->with(['bodyId' => 'menu']); })->name('menu');
