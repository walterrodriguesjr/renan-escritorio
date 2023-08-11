<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listarClientes() {
       $clientes = Cliente::all();
       return $clientes;
    }
}
