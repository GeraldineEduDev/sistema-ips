    @extends('components.layout')

    @section('title')
        Agregar Tipo de Servicio
    @endsection

    @section('content')
        <h1>Agregar Tipo de Servicio</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tipos_servicio.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Guardar</button>
                <a href="{{ route('tipos_servicio.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    @endsection
