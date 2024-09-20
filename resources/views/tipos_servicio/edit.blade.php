@extends('components.layout')

@section('title', 'Editar Tipo de Servicio')

@section('content')
    <h1>Editar Tipo de Servicio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tipos_servicio.update', $tipoServicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $tipoServicio->nombre) }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('tipos_servicio.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
