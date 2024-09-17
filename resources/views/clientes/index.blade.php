@extends('components.layout')

@section('name')
    Clientes | Inicio
@endsection

@section('content')
    <h1 class="text-center">Clientes</h1>

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Tipo Documento</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Razon Social</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Tipo</th>
        </thead>
    </table>
@endsection