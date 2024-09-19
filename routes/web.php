<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return view('index');
});

Route::resource('clientes', ClienteController::class);
route::resource('pacientes', PacienteController::class);

