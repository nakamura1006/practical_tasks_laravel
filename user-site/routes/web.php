<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentRequestController;

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

Route::get('/document_request/input', [DocumentRequestController::class, 'input'])->name('document_request.input');
Route::post('/document_request/input', [DocumentRequestController::class, 'repair'])->name('document_request.repair');
Route::post('/document_request/confirm', [DocumentRequestController::class, 'confirm'])->name('document_request.confirm');
Route::post('/document_request/result', [DocumentRequestController::class, 'result'])->name('document_request.result');
