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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profissional_id')->nullable(false);
            $table->bigInteger('cliente_id')->nullable(true);
            $table->bigInteger('servico_id')->nullable(true);
            $table->date('data_hora')->nullable(false);
            $table->string('tipo_pagamento', 20)->nullable(true);
            $table->decimal('valor')->nullable(true);
            $table->timestamps();
        });
    }

    /**l
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
