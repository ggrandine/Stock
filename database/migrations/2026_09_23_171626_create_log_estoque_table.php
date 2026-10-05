<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_estoque', function (Blueprint $table) {
            $table->id('id_log');
            $table->foreignId('id_material')->constrained('material','id_material');
            $table->integer('quantidade_anterior');
            $table->integer('quantidade_nova');
            $table->dateTime('data_alteracao')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_estoque');
    }
};