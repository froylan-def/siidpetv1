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
        Schema::create('delito', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 10);
            $table->string('tipo', 10)->nullable();;
            $table->text('observaciones')->nullable();;
        });

        Schema::create('audiencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 10);
            $table->string('tipo', 10)->nullable();;
            $table->text('observaciones')->nullable();;
        });

        //
        Schema::create('cuenta_diaria', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->string('cp', 10);
            $table->date('fecha');
            $table->time('hora');
            $table->string('sala', 10);
            $table->text('observaciones')->nullable();
            $table->text('resultado')->nullable();
            $table->foreignId('imputado')->constrained('imputado');
            $table->foreignId('delito')->constrained('delito');
            $table->foreignId('audiencia')->constrained('audiencia');
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
