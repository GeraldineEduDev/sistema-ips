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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento', 50);
            $table->string('documento', 100)->unique();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 50);
            $table->string('email', 255)->nullable();
            $table->string('tipo_sangre', 10)->nullable();
            $table->date('expedicion_documento');
            $table->text('alergias')->nullable();
            $table->string('sexo', 10);
            $table->string('genero', 50);
            $table->foreignId('eps_id')->constrained('eps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
