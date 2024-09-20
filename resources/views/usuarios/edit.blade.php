@extends('components.layout')

@section('content')
    <h1>Editar Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Cédula de Ciudadanía" {{ old('tipo_documento', $usuario->tipo_documento) == 'Cédula de Ciudadanía' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="Tarjeta de Identidad" {{ old('tipo_documento', $usuario->tipo_documento) == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="NIT" {{ old('tipo_documento', $usuario->tipo_documento) == 'NIT' ? 'selected' : '' }}>NIT</option>
                    <option value="Pasaporte" {{ old('tipo_documento', $usuario->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                    <option value="Permiso Especial de Permanencia" {{ old('tipo_documento', $usuario->tipo_documento) == 'Permiso Especial de Permanencia' ? 'selected' : '' }}>Permiso Especial de Permanencia</option>
                    <option value="Cédula de Extranjería" {{ old('tipo_documento', $usuario->tipo_documento) == 'Cédula de Extranjería' ? 'selected' : '' }}>Cédula de Extranjería</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" id="documento" class="form-control" value="{{ old('documento', $usuario->documento) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres', $usuario->nombres) }}" required>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $usuario->apellidos) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="rol_id" class="form-label">Rol</label>
                <select name="rol_id" id="rol_id" class="form-select" required>
                    <option value="">Seleccione un Rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="1" {{ old('estado', $usuario->estado) == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('estado', $usuario->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
