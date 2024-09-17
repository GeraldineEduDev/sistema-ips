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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->string('tipo_documento', 50);
            $table->string('documento', 100);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->foreignId('rol_id')->constrained('roles');
            $table->boolean('estado'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
