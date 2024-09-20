@extends('components.layout')

@section('title')
    Editar Biológico
@endsection

@section('content')
    <h1>Editar Biológico</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('biologicos.update', $biologico) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $biologico->nombre) }}" required>
            </div>

            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo', $biologico->tipo) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio', $biologico->precio) }}" required>
            </div>

            <div class="col-md-6">
                <label for="presentacion" class="form-label">Presentación</label>
                <input type="text" name="presentacion" id="presentacion" class="form-control" value="{{ old('presentacion', $biologico->presentacion) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $biologico->marca) }}" required>
            </div>

            <div class="col-md-6">
                <label for="laboratorio" class="form-label">Laboratorio</label>
                <input type="text" name="laboratorio" id="laboratorio" class="form-control" value="{{ old('laboratorio', $biologico->laboratorio) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_expiracion" class="form-label">Fecha de Expiración</label>
                <input type="date" name="fecha_expiracion" id="fecha_expiracion" class="form-control" value="{{ old('fecha_expiracion', $biologico->fecha_expiracion) }}" required>
            </div>

            <div class="col-md-6">
                <label for="lote" class="form-label">Lote</label>
                <input type="text" name="lote" id="lote" class="form-control" value="{{ old('lote', $biologico->lote) }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('biologicos.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
