<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material', function (Blueprint $table) {
            $table->id('id_material');
            $table->string('nome',100);
            $table->string('categoria',50)->nullable();
            $table->integer('quantidade')->default(0);
            $table->string('unidade',20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};