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
        Schema::create('historialEtapaProcesal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEtapa')->constrained('etapa');
            $table->foreignId('idImputado')->constrained('imputado');
            $table->foreignId('idNUC')->constrained('NUC');
            $table->tinyInteger('estado');
            $table->string('estatusImputado');
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
