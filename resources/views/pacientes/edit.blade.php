@extends('components.layout')

@section('content')
    <h1>Editar Paciente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Cédula de Ciudadanía" {{ old('tipo_documento', $paciente->tipo_documento) == 'Cédula de Ciudadanía' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="Tarjeta de Identidad" {{ old('tipo_documento', $paciente->tipo_documento) == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="NIT" {{ old('tipo_documento', $paciente->tipo_documento) == 'NIT' ? 'selected' : '' }}>NIT</option>
                    <option value="Pasaporte" {{ old('tipo_documento', $paciente->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                    <option value="Permiso Especial de Permanencia" {{ old('tipo_documento', $paciente->tipo_documento) == 'Permiso Especial de Permanencia' ? 'selected' : '' }}>Permiso Especial de Permanencia</option>
                    <option value="Cédula de Extranjería" {{ old('tipo_documento', $paciente->tipo_documento) == 'Cédula de Extranjería' ? 'selected' : '' }}>Cédula de Extranjería</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" id="documento" class="form-control" value="{{ old('documento', $paciente->documento) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres', $paciente->nombres) }}" required>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $paciente->apellidos) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $paciente->telefono) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $paciente->email) }}">
            </div>

            <div class="col-md-6">
                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                <select name="tipo_sangre" id="tipo_sangre" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="A+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'O-' ? 'selected' : '' }}>O-</option>
                </select>
            </div>            
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="expedicion_documento" class="form-label">Fecha de Expedición del Documento</label>
                <input type="date" name="expedicion_documento" id="expedicion_documento" class="form-control" value="{{ old('expedicion_documento', $paciente->expedicion_documento) }}" required>
            </div>

            <div class="col-md-6">
                <label for="alergias" class="form-label">Alergias</label>
                <textarea name="alergias" id="alergias" class="form-control">{{ old('alergias', $paciente->alergias) }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Masculino" {{ old('sexo', $paciente->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo', $paciente->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Masculino" {{ old('genero', $paciente->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('genero', $paciente->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="No Binario" {{ old('genero', $paciente->genero) == 'No Binario' ? 'selected' : '' }}>No Binario</option>
                    <option value="Otro" {{ old('genero', $paciente->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="eps_id" class="form-label">EPS</label>
                <select name="eps_id" id="eps_id" class="form-select" required>
                    <option value="">Seleccione una EPS</option>
                    @foreach($epsList as $eps)
                        <option value="{{ $eps->id }}" {{ old('eps_id', $paciente->eps_id) == $eps->id ? 'selected' : '' }}>{{ $eps->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
