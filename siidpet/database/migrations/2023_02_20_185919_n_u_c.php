<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Auth;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NUC', function (Blueprint $table) {
            $table->id();
            $table->string('NUC');
            $table->foreignId('IDUsuario')->constrained('users');
            $table->integer('delito');
            $table->date('fechaRegistro');
            $table->boolean('estado');
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
        Schema::dropIfExists('NUC');
    }
};
