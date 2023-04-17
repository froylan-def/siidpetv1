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
        //
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('codigo_postal');
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('num_ext')->nullable();
            $table->string('num_int')->nullable();
            $table->timestamps();
        });

        Schema::create('peticionario', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('CURP', 18)->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_particular')->nullable();
            $table->foreignId('id_direccion')->constrained('direccion');
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
        //
    }
};
