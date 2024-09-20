@extends('components.layout')

@section('title')
    Usuarios
@endsection

@section('content')
    <h1>Listado de Usuarios</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
            Agregar Usuario
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipo de Documento</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->tipo_documento }}</td>
                        <td>{{ $usuario->documento }}</td>
                        <td>{{ $usuario->nombres }}</td>
                        <td>{{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->rol->nombre ?? 'N/A' }}</td>
                        <td>{{ $usuario->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning me-1">
                                    <i class="ti ti-edit"></i>
                                </a>

                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-1" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>

                                <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info">
                                    <i class="ti ti-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
