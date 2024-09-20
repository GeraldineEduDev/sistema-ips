@extends('components.layout')

@section('title')
    Agregar Muestra
@endsection

@section('content')
    <h1>Agregar Muestra</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('muestras.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" step="0.01" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Guardar</button>
            <a href="{{ route('muestras.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
