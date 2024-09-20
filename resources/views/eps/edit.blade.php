@extends('components.layout')

@section('content')
    <h1>Editar EPS</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eps.update', $eps->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre de la EPS</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $eps->nombre) }}" required>
            </div>

            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $eps->direccion) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $eps->telefono) }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico (opcional)</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $eps->email) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo de EPS</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="">Seleccione el tipo</option>
                    <option value="Contributivo" {{ old('tipo', $eps->tipo) == 'Contributivo' ? 'selected' : '' }}>Contributivo</option>
                    <option value="Subsidiado" {{ old('tipo', $eps->tipo) == 'Subsidiado' ? 'selected' : '' }}>Subsidiado</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('eps.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
