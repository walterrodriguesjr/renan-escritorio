<?php

use App\Http\Controllers\Cidades;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClientePessoaJuridicaController;
use App\Http\Controllers\Estados;
use App\Http\Controllers\UsuarioController;
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

//VIEWS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/clientes', function () {
    return view('clientes');
})->middleware(['auth', 'verified'])->name('clientes');

Route::get('/administrador', function () {
    return view('administrador');
})->middleware(['auth', 'verified', 'nivelAcessoAdministrador'])->name('administrador');
//VIEWS

//CLIENTE PESSOA FÍSICA
Route::get('/listarClientes', [ClienteController::class, 'listarClientes'])->name('listarClientes');
Route::post('adicionarCliente', [ClienteController::class, 'adicionarCliente'])->name('adicionarCliente');
Route::get('visualizarCliente/{id}', [ClienteController::class, 'visualizarCliente'])->name('visualizarCliente');
Route::put('editarCliente/{id}', [ClienteController::class, 'editarCliente'])->name('editarCliente');
Route::delete('deletarCliente/{id}', [ClienteController::class, 'deletarCliente'])->name('deletarCliente');

//CLIENTE PESSOA JURÍDICA
Route::get('listarClientesPessoaJuridica', [ClientePessoaJuridicaController::class, 'listarClientesPessoaJuridica'])->name('listarClientesPessoaJuridica');
Route::post('adicionarClientePessoaJuridica', [ClientePessoaJuridicaController::class, 'adicionarClientePessoaJuridica'])->name('adicionarClientePessoaJuridica');
Route::get('visualizarClientePessoaJuridica/{id}', [ClientePessoaJuridicaController::class, 'visualizarClientePessoaJuridica'])->name('visualizarClientePessoaJuridica');
Route::put('editarClientePessoaJuridica/{id}', [ClientePessoaJuridicaController::class, 'editarClientePessoaJuridica'])->name('editarClientePessoaJuridica');
Route::delete('deletarClientePessoaJuridica/{id}', [ClientePessoaJuridicaController::class, 'deletarClientePessoaJuridica'])->name('deletarClientePessoaJuridica');

//USUÁRIO (ADMINISTRADOR)
Route::post('/adicionarUsuario', [UsuarioController::class, 'adicionarUsuario'])->middleware('nivelAcessoAdministrador')->name('adicionarUsuario');
Route::get('/listarUsuarios', [UsuarioController::class, 'listarUsuarios'])->middleware('nivelAcessoAdministrador')->name('listarUsuarios');
Route::get('/visualizarUsuario/{id}', [UsuarioController::class, 'visualizarUsuario'])->middleware('nivelAcessoAdministrador')->name('visualizarUsuario');
Route::put('/editarUsuario/{id}', [UsuarioController::class, 'editarUsuario'])->middleware('nivelAcessoAdministrador')->name('editarUsuario');




require __DIR__.'/auth.php';
