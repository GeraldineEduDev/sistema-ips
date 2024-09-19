@extends('components.layout')

@section('content')
    <h1>Pacientes</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
            Nuevo Paciente
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
                <th>ID</th>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>EPS</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->tipo_documento }}</td>
                    <td>{{ $paciente->documento }}</td>
                    <td>{{ $paciente->nombres }}</td>
                    <td>{{ $paciente->apellidos }}</td>
                    <td>{{ $paciente->eps->nombre ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-sm btn-info">
                            <i class="ti ti-eye"></i>
                        </a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-edit"></i>
                        </a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
