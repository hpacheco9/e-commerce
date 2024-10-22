<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->integer('referencia')->nullable(false)->primary();
            $table->string('nome', 255);
            $table->float('preco', 255);
            $table->text('descricao');
            $table->string('dosagem');
            $table->string('image');
            $table->string('forma');
            $table->integer('quantidade');
            $table->string('industria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
