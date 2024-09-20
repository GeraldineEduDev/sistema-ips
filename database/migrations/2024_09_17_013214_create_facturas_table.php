<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_servicio_id')->constrained('tipos_servicio');
            $table->dateTime('fecha_facturacion');
            $table->foreignId('estado_id')->constrained('estados_factura');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->decimal('total', 10, 2)->default(0);
            $table->integer('total_cantidad')->default(0); 
            $table->timestamps();
        });        
    }        

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
