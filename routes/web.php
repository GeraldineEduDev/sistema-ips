<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/', function () {
    return view('index');
});

Route::resource('clientes', ClienteController::class);

