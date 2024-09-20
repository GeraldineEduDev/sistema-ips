@extends('components.layout')

@section('title')
    Muestras
@endsection

@section('content')
    <h1>Listado de Muestras</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('muestras.create') }}" class="btn btn-primary">
            Agregar Muestra
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($muestras as $muestra)
                <tr>
                    <td>{{ $muestra->nombre }}</td>
                    <td>${{ number_format($muestra->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('muestras.edit', $muestra) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i>
                        </a>

                        <form action="{{ route('muestras.destroy', $muestra) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta muestra?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
