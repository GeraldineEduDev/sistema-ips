@extends('components.layout')

@section('title', 'Mostrar Factura')

@section('content')
    <h1>Mostrar Factura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tipo_servicio_id" class="form-label">Tipo de Servicio</label>
            <input type="text" class="form-control" value="{{ $factura->tipoServicio->nombre ?? 'N/A' }}" readonly>
        </div>

        <div class="col-md-6">
            <label for="fecha_facturacion" class="form-label">Fecha de Facturación</label>
            <input type="text" class="form-control" value="{{ $factura->fecha_facturacion }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="estado_id" class="form-label">Estado</label>
            <input type="text" class="form-control" value="{{ $factura->estado->nombre ?? 'N/A' }}" readonly>
        </div>

        <div class="col-md-6">
            <label for="paciente_id" class="form-label">Paciente</label>
            <input type="text" class="form-control" value="{{ $factura->paciente->nombres }} {{ $factura->paciente->apellidos }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cliente_id" class="form-label">Cliente</label>
            <input type="text" class="form-control" value="{{ $factura->cliente->razon_social ?? 'N/A' }}" readonly>
        </div>
    </div>

    <h3>Detalles de la Factura</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipo de Item</th>
                <th>Item</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factura->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->tipo_item == 'biologico' ? 'Biológico' : 'Muestra' }}</td>
                    <td>
                        @php
                            $itemName = $detalle->biologico_id ? 
                                ($biologicos->find($detalle->biologico_id)->nombre ?? 'ID: '.$detalle->biologico_id) : 
                                ($muestras->find($detalle->muestra_id)->nombre ?? 'ID: '.$detalle->muestra_id);
                        @endphp
                        {{ $itemName }}
                    </td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->precio_unitario }}</td>
                    <td>{{ $detalle->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="total_cantidad" class="form-label">Total Cantidad</label>
            <input type="number" id="total_cantidad" class="form-control" value="{{ $factura->total_cantidad }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="total" class="form-label">Total</label>
            <input type="number" id="total" class="form-control" value="{{ $factura->total }}" readonly>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
