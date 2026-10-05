<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('relatorio', function (Blueprint $table) {
            $table->id('id_relatorio');
            $table->string('titulo', 150);
            $table->longText('conteudo');
            $table->string('autor_nome', 100)->nullable();
            $table->string('autor_email', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relatorio');
    }
};
