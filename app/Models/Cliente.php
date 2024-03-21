<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nomeCliente',
        'estadoRgCliente',
        'rgCliente',
        'cpfCliente',
        'emailCliente',
        'celularCliente',
        'telefoneCliente',
        'enderecoCliente',
        'numeroCliente',
        'complementoCliente',
        'estadoCliente',
        'cidadeCliente'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
