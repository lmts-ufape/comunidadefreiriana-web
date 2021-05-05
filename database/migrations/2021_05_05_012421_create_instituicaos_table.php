<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('categoria');
            $table->string('pais');
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('cep');
            $table->string('telefone');
            $table->string('email');
            $table->string('site');
            $table->string('coordenador');
            $table->date('datafundacao');
            $table->date('DatadeRealizacao');
            $table->string('NomedaRealizacao');
            $table->double('latitude', 10, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->string('info');
            $table->boolean('autorizado')->nullable();
            $table->boolean('confirmacaoEmail')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('instituicaos');
    }
}
