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
        Schema::create('etapa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
        });

        //
        Schema::create('bitacora_nsjpao', function (Blueprint $table) {
            $table->id();
            $table->mediumText('nota');
            $table->string('fecha');
            $table->foreignId('id_imputado')->constrained('imputado');
            $table->foreignId('id_etapa')->constrained('etapa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
