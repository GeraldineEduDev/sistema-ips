@extends('components.layout')

@section('title')
    EPS
@endsection

@section('content')
    <h1>Listado de EPS</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('eps.create') }}" class="btn btn-primary">
            Agregar EPS
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
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eps as $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->direccion }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->email ?? 'N/A' }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>
                        <a href="{{ route('eps.edit', $item) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i>
                        </a>

                        <form action="{{ route('eps.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta EPS?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
