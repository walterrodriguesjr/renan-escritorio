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
        Schema::create('user_dados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Chave estrangeira para relacionar com a tabela 'users'
            $table->string('nomeUsuario')->required();
            $table->string('estadoRgUsuario')->nullable();
            $table->string('rgUsuario')->nullable();
            $table->string('cpfUsuario')->required()->unique();
            $table->string('emailUsuario')->required()->unique();
            $table->string('celularUsuario')->required();
            $table->string('telefoneUsuario')->nullable();
            $table->string('enderecoUsuario')->nullable();
            $table->string('numeroUsuario')->nullable();
            $table->string('complementoUsuario')->nullable();
            $table->string('estadoUsuario')->nullable();
            $table->string('cidadeUsuario')->nullable();
            $table->string('token');
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
        Schema::dropIfExists('user_dados');
    }
};
