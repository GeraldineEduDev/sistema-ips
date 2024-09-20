@extends('components.layout')

@section('title')
    Agregar EPS
@endsection

@section('content')
    <h1>Agregar EPS</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eps.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo de EPS</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Contributivo">Contributivo</option>
                    <option value="Subsidiado">Subsidiado</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Guardar</button>
            <a href="{{ route('eps.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
