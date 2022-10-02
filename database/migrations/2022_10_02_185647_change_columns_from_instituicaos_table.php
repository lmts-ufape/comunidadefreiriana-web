<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsFromInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituicaos', function (Blueprint $table) {
            $table->string('cep')->nullable()->change();
            $table->string('estado')->nullable()->change();
            $table->string('cidade')->nullable()->change();
            $table->string('endereco')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->date('datafundacao')->nullable()->change();
            $table->string('coordenador')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instituicaos', function (Blueprint $table) {
            //
        });
    }
}
