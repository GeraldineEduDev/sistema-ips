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
                    @foreach($tiposServicio as $tipo)
                        <option value="{{ $tipo->id }}" {{ isset($factura) && $factura->tipo_servicio_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="fecha_facturacion" class="form-label">Fecha de Facturación</label>
                <input type="datetime-local" name="fecha_facturacion" id="fecha_facturacion" class="form-control" value="{{ isset($factura) ? $factura->fecha_facturacion : '' }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="estado_id" class="form-label">Estado</label>
                <select name="estado_id" id="estado_id" class="form-select" required>
                    <option value="">Seleccione estado</option>
                    @foreach($estadosFactura as $estado)
                        <option value="{{ $estado->id }}" {{ isset($factura) && $factura->estado_id == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="form-select" required>
                    <option value="">Seleccione un paciente</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ isset($factura) && $factura->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
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
                            {{ $cliente['display'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <h3>Detalles de la Factura</h3>
        <div id="detalles-container">
            <div class="detalle-item mb-3">
                <div class="row">
                    <div class="col">
                        <label for="tipo_item" class="form-label">Tipo de Item</label>
                        <select name="tipo_item[]" class="form-select tipo-item" required>
                            <option value="">Seleccione un tipo de item</option>
                            <option value="biologico">Biológico</option>
                            <option value="muestra">Muestra</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="item_id" class="form-label">Item</label>
                        <select name="item_id[]" class="form-select item-select" required>
                            <option value="">Seleccione un item</option>
                            @foreach($biologicos as $biologico)
                                <option value="{{ $biologico->id }}" class="biologico">{{ $biologico->nombre }}</option>
                            @endforeach
                            @foreach($muestras as $muestra)
                                <option value="{{ $muestra->id }}" class="muestra">{{ $muestra->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="precio_unitario" class="form-label">Precio Unitario</label>
                        <input type="number" name="precio_unitario[]" class="form-control precio-unitario-input" required readonly>
                    </div> 
                    <div class="col">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad[]" class="form-control cantidad-input" required min="1">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"> 
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="number" name="subtotal[]" class="form-control subtotal-input" required readonly>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-detalle" class="btn btn-secondary mb-3">Agregar Detalle</button>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="total_cantidad" class="form-label">Total Cantidad</label>
                <input type="number" name="total_cantidad" id="total_cantidad" class="form-control" value="{{ isset($factura) ? $factura->total_cantidad : 0 }}" required readonly>
            </div>
            <div class="col-md-6">
                <label for="total" class="form-label">Total</label>
                <input type="number" name="total" id="total" class="form-control" value="{{ isset($factura) ? $factura->total : 0 }}" required readonly>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">{{ isset($factura) ? 'Actualizar' : 'Crear' }}</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <script>
        document.getElementById('add-detalle').onclick = function() {
            const container = document.getElementById('detalles-container');
            const newDetail = `
                <div class="detalle-item mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tipo_item" class="form-label">Tipo de Item</label>
                            <select name="tipo_item[]" class="form-select tipo-item" required>
                                <option value="">Seleccione un tipo de item</option>
                                <option value="biologico">Biológico</option>
                                <option value="muestra">Muestra</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="item_id" class="form-label">Item</label>
                            <select name="item_id[]" class="form-select item-select" required>
                                <option value="">Seleccione un item</option>
                                @foreach($biologicos as $biologico)
                                    <option value="{{ $biologico->id }}" class="biologico">{{ $biologico->nombre }}</option>
                                @endforeach
                                @foreach($muestras as $muestra)
                                    <option value="{{ $muestra->id }}" class="muestra">{{ $muestra->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" name="cantidad[]" class="form-control cantidad-input" required min="1>
                        </div>
                        <div class="col">
                            <label for="precio_unitario" class="form-label">Precio Unitario</label>
                            <input type="number" name="precio_unitario[]" class="form-control precio-unitario-input" required readonly>
                        </div>
                        <div class="col">
                            <label for="subtotal" class="form-label">Subtotal</label>
                            <input type="number" name="subtotal[]" class="form-control subtotal-input" required readonly>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newDetail);
        };

        document.getElementById('detalles-container').addEventListener('change', function(e) {
        if (e.target.classList.contains('tipo-item')) {
            const tipoItem = e.target.value;
            const itemSelect = e.target.closest('.detalle-item').querySelector('.item-select');
            const precioUnitarioInput = e.target.closest('.detalle-item').querySelector('.precio-unitario-input');
            const subtotalInput = e.target.closest('.detalle-item').querySelector('.subtotal-input');

            // Resetea el select de item y los precios
            itemSelect.value = '';
            precioUnitarioInput.value = '';
            subtotalInput.value = '';

            // Actualiza las opciones de item según el tipo seleccionado
            const items = tipoItem === 'biologico' ? @json($biologicos) : @json($muestras);
            itemSelect.innerHTML = '<option value="">Seleccione un item</option>';
            items.forEach(item => {
                itemSelect.insertAdjacentHTML('beforeend', `<option value="${item.id}" data-precio="${item.precio}">${item.nombre}</option>`);
            });
        }

        if (e.target.classList.contains('item-select')) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const precioUnitarioInput = e.target.closest('.detalle-item').querySelector('.precio-unitario-input');
            
            // Establece el precio unitario basado en el item seleccionado
            precioUnitarioInput.value = selectedOption.dataset.precio || '';
        }

        if (e.target.classList.contains('cantidad-input') || e.target.classList.contains('precio-unitario-input')) {
            const cantidadInput = e.target.closest('.detalle-item').querySelector('.cantidad-input');
            const precioUnitarioInput = e.target.closest('.detalle-item').querySelector('.precio-unitario-input');
            const subtotalInput = e.target.closest('.detalle-item').querySelector('.subtotal-input');

            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precioUnitario = parseFloat(precioUnitarioInput.value) || 0;

            subtotalInput.value = cantidad * precioUnitario;
            calcularTotal();
        }
        });


        function calcularTotal() {
            const detalleItems = document.querySelectorAll('.detalle-item');
            let totalCantidad = 0;
            let total = 0;

            detalleItems.forEach(item => {
                const cantidadInput = item.querySelector('.cantidad-input');
                const subtotalInput = item.querySelector('.subtotal-input');

                totalCantidad += parseFloat(cantidadInput.value) || 0;
                total += parseFloat(subtotalInput.value) || 0;
            });

            document.getElementById('total_cantidad').value = totalCantidad;
            document.getElementById('total').value = total;
        }
    </script>
@endsection
