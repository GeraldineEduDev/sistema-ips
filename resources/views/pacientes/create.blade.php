@extends('components.layout')

@section('title')
    Agregar Paciente
@endsection

@section('content')
    <h1>Agregar Paciente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="NIT">NIT</option>
                    <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                    <option value="Permiso Temporal de Permanencia">Permiso Temporal de Permanencia</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" id="documento" class="form-control" value="{{ old('documento') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres') }}" required>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="col-md-6">
                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                <select name="tipo_sangre" id="tipo_sangre" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>            
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="expedicion_documento" class="form-label">Fecha de Expedición del Documento</label>
                <input type="date" name="expedicion_documento" id="expedicion_documento" class="form-control" value="{{ old('expedicion_documento') }}" required>
            </div>

            <div class="col-md-6">
                <label for="alergias" class="form-label">Alergias</label>
                <textarea name="alergias" id="alergias" class="form-control">{{ old('alergias') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="No Binario">No Binario</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="eps_id" class="form-label">EPS</label>
                <select name="eps_id" id="eps_id" class="form-select" required>
                    <option value="">Seleccione una EPS</option>
                    @foreach($epsList as $eps)
                        <option value="{{ $eps->id }}">{{ $eps->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
