@extends('components.layout')

@section('title', isset($factura) ? 'Editar Factura' : 'Crear Factura')

@section('content')
    <h1>{{ isset($factura) ? 'Editar Factura' : 'Crear Factura' }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($factura) ? route('facturas.update', $factura->id) : route('facturas.store') }}" method="POST">
        @csrf
        @if(isset($factura)) @method('PUT') @endif

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_servicio_id" class="form-label">Tipo de Servicio</label>
                <select name="tipo_servicio_id" id="tipo_servicio_id" class="form-select" required>
                    <option value="">Seleccione un tipo de servicio</option>
                    @foreach($tiposServicios as $tipo)
                        <option value="{{ $tipo->id }}" {{ isset($factura) && $factura->tipo_servicio_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="fecha_facturacion" class="form-label">Fecha de Facturación</label>
                <input type="datetime-local" name="fecha_facturacion" id="fecha_facturacion" class="form-control" value="{{ old('fecha_facturacion', isset($factura) ? $factura->fecha_facturacion : '') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="estado_id" class="form-label">Estado</label>
                <select name="estado_id" id="estado_id" class="form-select" required>
                    <option value="">Seleccione estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ isset($factura) && $factura->estado_id == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                    @endforeach                
                </select>
            </div>

            <div class="col-md-6">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="form-select" required>
                    <option value="">Seleccione un paciente</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ (old('paciente_id', isset($factura) ? $factura->paciente_id : null) == $paciente->id) ? 'selected' : '' }}>{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-select" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente['id'] }}" {{ isset($factura) && $factura->cliente_id == $cliente['id'] ? 'selected' : '' }}>
                            {{ $cliente['razon_social'] }} 
                        </option>
                    @endforeach
                </select>
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
                        <td>
                            {{ $detalle->tipo_item == 'biologico' ? 'Biológico' : 'Muestra' }}
                        </td>
                        <td>
                            @php
                                $itemName = $detalle->biologico_id ? 
                                    ($biologicos->find($detalle->biologico_id)->nombre ?? 'ID: '.$detalle->biologico_id) : 
                                    ($muestras->find($detalle->muestra_id)->nombre ?? 'ID: '.$detalle->muestra_id);
                            @endphp
                            {{ $itemName }}
                        </td>
                        <td>
                            {{ $detalle->cantidad }}
                        </td>
                        <td>
                            {{ $detalle->precio_unitario }}
                        </td>
                        <td>
                            {{ $detalle->subtotal }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="total_cantidad" class="form-label">Total Cantidad</label>
                <input type="number" name="total_cantidad" id="total_cantidad" class="form-control" value="{{ old('total_cantidad', isset($factura) ? $factura->total_cantidad : 0) }}" required readonly>
            </div>
            <div class="col-md-6">
                <label for="total" class="form-label">Total</label>
                <input type="number" name="total" id="total" class="form-control" value="{{ old('total', isset($factura) ? $factura->total : 0) }}" required readonly>
            </div>
        </div>
        
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">{{ isset($factura) ? 'Actualizar' : 'Crear' }}</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
