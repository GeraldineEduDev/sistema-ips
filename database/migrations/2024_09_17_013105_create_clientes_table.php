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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento', 50);
            $table->string('documento', 100)->unique();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->string('razon_social', 255)->nullable();
            $table->string('telefono', 50);
            $table->string('email', 255)->unique()->nullable();
            $table->string('direccion', 255);
            $table->string('tipo_cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
