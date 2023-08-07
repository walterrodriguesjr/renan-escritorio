<?php

use App\Http\Controllers\Cidades;
use App\Http\Controllers\Estados;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/clientes', function () {
    return view('clientes');
})->middleware(['auth', 'verified'])->name('clientes');

Route::get('/estados', [Estados::class, 'estados'])->name('estados');
/* Route::get('/cidades', [Cidades::class, 'cidades'])->name('cidades'); */



require __DIR__.'/auth.php';
