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
        Schema::create('imputado', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('CURP',18);
            $table->foreignId('IDSexo')->constrained('sexo');
            $table->tinyInteger('IDMunicipio')->nulleable;
            $table->string('direccion')->nullable;
            $table->string('correo')->nullable;
            $table->string('telefono')->nullable;
            $table->string('estado')->nullable;
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
        Schema::dropIfExists('imputado');
    }
};
