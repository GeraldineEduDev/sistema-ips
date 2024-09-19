@extends('components.layout')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="CC" {{ $cliente->tipo_documento == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="TI" {{ $cliente->tipo_documento == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="NIT" {{ $cliente->tipo_documento == 'NIT' ? 'selected' : '' }}>NIT</option>
                    <option value="PAS" {{ $cliente->tipo_documento == 'PAS' ? 'selected' : '' }}>Pasaporte</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" id="documento" class="form-control" value="{{ $cliente->documento }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $cliente->nombres }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $cliente->apellidos }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="razon_social" class="form-label">Razón Social</label>
                <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ $cliente->razon_social }}" placeholder="Opcional">
            </div>

            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $cliente->telefono }}" placeholder="Opcional">
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $cliente->email }}" placeholder="Opcional">
            </div>

            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $cliente->direccion }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                <select name="tipo_cliente" id="tipo_cliente" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Persona Natural" {{ $cliente->tipo_cliente == 'Persona Natural' ? 'selected' : '' }}>Persona Natural</option>
                    <option value="Persona Jurídica" {{ $cliente->tipo_cliente == 'Persona Jurídica' ? 'selected' : '' }}>Persona Jurídica</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
