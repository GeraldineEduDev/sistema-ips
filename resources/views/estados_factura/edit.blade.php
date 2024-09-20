@extends('components.layout')

@section('content')
    <h1>Editar Estado de Factura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estados_factura.update', $estadoFactura) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nombre" class="form-label">Nombre del Estado</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estadoFactura->nombre) }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('estados_factura.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
@endsection
