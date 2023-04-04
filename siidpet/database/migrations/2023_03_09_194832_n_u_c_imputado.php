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
        Schema::create('NUCImputado', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('IDImputado');
            //$table->unsignedBigInteger('IDNUC');
            //$table->foreignId('IDImputado')->references('id')->on('imputado');
            $table->foreignId('IDImputado')->constrained('imputado');
            $table->foreignId('IDNUC')->constrained('NUC');
            //$table->foreignId('IDNUC')->references('id')->on('NUC');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NUCImputado');
    }
    
};
