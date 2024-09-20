@extends('components.layout')

@section('title')
    Agregar Biológico
@endsection

@section('content')
    <h1>Agregar Biológico</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('biologicos.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" required>
            </div>

            <div class="col-md-6">
                <label for="presentacion" class="form-label">Presentación</label>
                <input type="text" name="presentacion" id="presentacion" class="form-control" value="{{ old('presentacion') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca') }}" required>
            </div>

            <div class="col-md-6">
                <label for="laboratorio" class="form-label">Laboratorio</label>
                <input type="text" name="laboratorio" id="laboratorio" class="form-control" value="{{ old('laboratorio') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_expiracion" class="form-label">Fecha de Expiración</label>
                <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ old('fecha_expiracion') }}" required>
            </div>

            <div class="col-md-6">
                <label for="lote" class="form-label">Lote</label>
                <input type="text" name="lote" id="lote" class="form-control" value="{{ old('lote') }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Guardar</button>
            <a href="{{ route('biologicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
