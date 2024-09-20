@extends('components.layout')

@section('content')
    <h1>Detalles del Paciente</h1>

    <form>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                <input type="text" id="tipo_documento" class="form-control" value="{{ $paciente->tipo_documento }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" id="documento" class="form-control" value="{{ $paciente->documento }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" class="form-control" value="{{ $paciente->nombres }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" class="form-control" value="{{ $paciente->apellidos }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" class="form-control" value="{{ $paciente->telefono }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" value="{{ $paciente->email }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                <input type="text" id="tipo_sangre" class="form-control" value="{{ $paciente->tipo_sangre }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="expedicion_documento" class="form-label">Fecha de Expedición del Documento</label>
                <input type="date" id="expedicion_documento" class="form-control" value="{{ $paciente->expedicion_documento }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="alergias" class="form-label">Alergias</label>
                <textarea id="alergias" class="form-control" disabled>{{ $paciente->alergias }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" id="sexo" class="form-control" value="{{ $paciente->sexo }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="genero" class="form-label">Género</label>
                <input type="text" id="genero" class="form-control" value="{{ $paciente->genero }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="eps" class="form-label">EPS</label>
                <input type="text" id="eps" class="form-control" value="{{ $paciente->eps->nombre ?? 'N/A' }}" disabled>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
@endsection
