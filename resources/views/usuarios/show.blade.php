@extends('components.layout')

@section('content')
    <h1>Detalles del Usuario</h1>

    <form>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <input type="text" id="tipo_documento" class="form-control" value="{{ $usuario->tipo_documento }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" id="documento" class="form-control" value="{{ $usuario->documento }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" class="form-control" value="{{ $usuario->nombres }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" class="form-control" value="{{ $usuario->apellidos }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" value="{{ $usuario->email }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="rol" class="form-label">Rol</label>
                <input type="text" id="rol" class="form-control" value="{{ $usuario->rol->nombre ?? 'N/A' }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" id="estado" class="form-control" value="{{ $usuario->estado ? 'Activo' : 'Inactivo' }}" disabled>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
@endsection
