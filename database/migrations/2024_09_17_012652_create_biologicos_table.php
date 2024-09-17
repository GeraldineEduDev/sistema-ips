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
        Schema::create('biologicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('tipo', 100);
            $table->decimal('precio', 10, 2);
            $table->string('presentacion', 100);
            $table->string('marca', 100);
            $table->string('laboratorio', 100);
            $table->date('fecha_expiracion');
            $table->string('lote', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biologicos');
    }
};
