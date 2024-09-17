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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_servicio_id')->constrained('tipos_servicio');
            $table->dateTime('fecha_facturacion');
            $table->foreignId('estado_id')->constrained('estados_factura');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->decimal('total', 10, 2);
            $table->integer('total_cantidad');
            $table->enum('tipo_item', ['biologico', 'muestra']);
            $table->foreignId('biologico_id')->nullable()->constrained('biologicos');
            $table->foreignId('muestra_id')->nullable()->constrained('muestras');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
