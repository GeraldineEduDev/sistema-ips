@extends('components.layout')

@section('title')
    Biológicos
@endsection

@section('content')
    <h1>Listado de Biológicos</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('biologicos.create') }}" class="btn btn-primary">
            Agregar Biológico
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
                <th>Tipo</th>
                <th>Precio</th>
                <th>Presentación</th>
                <th>Marca</th>
                <th>Laboratorio</th>
                <th>Fecha de Expiración</th>
                <th>Lote</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($biologicos as $biologico)
                <tr>
                    <td>{{ $biologico->nombre }}</td>
                    <td>{{ $biologico->tipo }}</td>
                    <td>{{ $biologico->precio }}</td>
                    <td>{{ $biologico->presentacion }}</td>
                    <td>{{ $biologico->marca }}</td>
                    <td>{{ $biologico->laboratorio }}</td>
                    <td>{{ \Carbon\Carbon::parse($biologico->fecha_expiracion)->format('Y-m-d') }}</td>
                    <td>{{ $biologico->lote }}</td>
                    <td>
                        <a href="{{ route('biologicos.edit', $biologico) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i>
                        </a>

                        <form action="{{ route('biologicos.destroy', $biologico) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este biológico?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
