@extends('components.layout')

@section('title')
    Facturas
@endsection

@section('content')
    <h1>Listado de Facturas</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('facturas.create') }}" class="btn btn-primary">
            Agregar Factura
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
                <th>Paciente</th>
                <th>Cliente</th>
                <th>Tipo de Servicio</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Fecha de Facturación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->paciente->nombres }} {{ $factura->paciente->apellidos }}</td>
                    <td>{{ $factura->cliente->razon_social }}</td>
                    <td>{{ $factura->tipoServicio->nombre }}</td>
                    <td>{{ $factura->estado->nombre }}</td>
                    <td>{{ number_format($factura->total, 2) }}</td>
                    <td>{{ $factura->fecha_facturacion->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i>
                        </a>

                        <form action="{{ route('facturas.destroy', $factura) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta factura?');">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>

                        <a href="{{ route('facturas.show', $factura) }}" class="btn btn-info">
                            <i class="ti ti-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
