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
        Schema::create('clientesPessoaJuridica', function (Blueprint $table) {
            $table->id();
            $table->string('nomeFantasia')->nullable();
            $table->string('razaoSocial')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('status')->nullable();
            $table->string('cnaePrincipalDescricao')->nullable();
            $table->string('cnaePrincipalCodigo')->nullable();
            $table->string('cep')->nullable();
            $table->string('dataAbertura')->nullable();
            $table->string('ddd')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('tipoLogradouro')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('municipio')->nullable();
            $table->string('uf')->nullable();

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
        Schema::dropIfExists('clientePessoaJuridicas');
    }
};
