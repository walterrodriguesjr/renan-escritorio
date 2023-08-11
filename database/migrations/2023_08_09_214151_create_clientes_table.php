<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente');
            $table->string('estadoRgCliente');
            $table->string('rgCliente');
            $table->string('cpfCliente')->unique();
            $table->string('emailCliente')->unique();
            $table->string('celularCliente');
            $table->string('telefoneCliente');
            $table->string('enderecoCliente');
            $table->string('numeroCliente');
            $table->string('complementoCliente');
            $table->string('estadoCliente');
            $table->string('cidadeCliente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
