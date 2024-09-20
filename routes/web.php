<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\EstadoFacturaController;



Route::get('/', function () {
    return view('index');
});

Route::resource('clientes', ClienteController::class);
route::resource('pacientes', PacienteController::class);
Route::resource('tipos_servicio', TipoServicioController::class);
Route::resource('estados_factura', EstadoFacturaController::class);
