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
            $table->string('nomeCliente')->required();
            $table->string('estadoRgCliente')->nullable();
            $table->string('rgCliente')->nullable();
            $table->string('cpfCliente')->required()->unique();
            $table->string('emailCliente')->required()->unique();
            $table->string('celularCliente')->required();
            $table->string('telefoneCliente')->nullable();
            $table->string('enderecoCliente')->nullable();
            $table->string('numeroCliente')->nullable();
            $table->string('complementoCliente')->nullable();
            $table->string('estadoCliente')->nullable();
            $table->string('cidadeCliente')->nullable();

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
