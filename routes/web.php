<?php

use App\Http\Controllers\Cidades;
use App\Http\Controllers\ClienteController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/clientes', function () {
    return view('clientes');
})->middleware(['auth', 'verified'])->name('clientes');

Route::get('/listarClientes', [ClienteController::class, 'listarClientes'])->name('listarClientes');
Route::post('adicionarCliente', [ClienteController::class, 'adicionarCliente'])->name('adicionarCliente');
Route::get('visualizarCliente/{id}', [ClienteController::class, 'visualizarCliente'])->name('visualizarCliente');
Route::put('editarCliente/{id}', [ClienteController::class, 'editarCliente'])->name('editarCliente');
Route::delete('deletarCliente/{id}', [ClienteController::class, 'deletarCliente'])->name('deletarCliente');




require __DIR__.'/auth.php';
