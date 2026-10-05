<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->id('id_movimentacao');
            $table->enum('tipo',['ENTRADA','SAIDA']);
            $table->integer('quantidade');
            $table->dateTime('data_movimentacao')->useCurrent();

            $table->foreignId('id_material')->constrained('material','id_material');
            $table->foreignId('id_usuario')->constrained('usuario','id_usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimentacao');
    }
};