<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\EstadoFacturaController;
use App\Http\Controllers\BiologicosController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\EPSController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('index');
});

Route::resource('clientes', ClienteController::class);
route::resource('pacientes', PacienteController::class);
Route::resource('tipos_servicio', TipoServicioController::class);
Route::resource('estados_factura', EstadoFacturaController::class);
Route::resource('biologicos', BiologicosController::class);
Route::resource('muestras', MuestraController::class);
Route::resource('eps', EPSController::class);
Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('facturas', FacturaController::class);


