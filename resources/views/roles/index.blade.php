@extends('components.layout')

@section('title')
    Roles
@endsection

@section('content')
    <h1>Listado de Roles</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            Agregar Rol
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
                <tr>
                    <td>{{ $rol->nombre }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $rol) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i>
                        </a>

                        <form action="{{ route('roles.destroy', $rol) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este rol?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
