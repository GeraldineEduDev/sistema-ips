<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Paciente;
use App\Models\Cliente;
use App\Models\TipoServicio;
use App\Models\EstadoFactura;
use App\Models\Biologico;
use App\Models\Muestra;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;


class FacturaController extends Controller
{
    // Mostrar lista de facturas
    public function index()
    {
        $facturas = Factura::with(['paciente', 'cliente', 'tipoServicio', 'estado', 'biologico', 'muestra'])->get();
        return view('facturas.index', compact('facturas'));
    }

    // Mostrar formulario para crear factura
    public function create()
    {
        $pacientes = Paciente::all();
    
        $clientes = Cliente::all()->map(function ($cliente) {
            return [
                'id' => $cliente->id,
                'display' => $cliente->razon_social ?: ($cliente->nombres . ' ' . $cliente->apellidos)
            ];
        });

        
        $biologicos = Biologico::all();
        $estadosFactura = EstadoFactura::all();
        $muestras = Muestra::all();
        $tiposServicio = TipoServicio::all();
    
        return view('facturas.create', compact('tiposServicio', 'estadosFactura', 'pacientes', 'clientes', 'biologicos', 'muestras'));
    }

    // Almacenar nueva factura
    public function store(Request $request)
    {
        $request->validate([
            // Validación de los campos de factura
            'tipo_servicio_id' => 'required|exists:tipos_servicio,id',
            'fecha_facturacion' => 'required|date',
            'estado_id' => 'required|exists:estados_factura,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'cliente_id' => 'required|exists:clientes,id',
            'total' => 'required|numeric',
            'total_cantidad' => 'required|integer',
            // Validación de los detalles
            'tipo_item.*' => 'required|in:biologico,muestra',
            'biologico_id.*' => 'nullable|exists:biologicos,id',
            'muestra_id.*' => 'nullable|exists:muestras,id',
            'cantidad.*' => 'required|integer|min:1',
            'precio_unitario.*' => 'required|numeric',
            'subtotal.*' => 'required|numeric',
        ]);
    
        // Guardar la factura
        $factura = Factura::create($request->except('tipo_item', 'biologico_id', 'muestra_id', 'cantidad', 'precio_unitario', 'subtotal'));
    
        // Guardar los detalles de la factura
        foreach ($request->tipo_item as $index => $tipo_item) {
            DetalleFactura::create([
                'factura_id' => $factura->id,
                'tipo_item' => $tipo_item,
                'biologico_id' => $request->biologico_id[$index] ?? null,
                'muestra_id' => $request->muestra_id[$index] ?? null,
                'cantidad' => $request->cantidad[$index] ?? null,
                'precio_unitario' => $request->precio_unitario[$index] ?? null,
                'subtotal' => $request->subtotal[$index] ?? null,
            ]);
        }
    
        return redirect()->route('facturas.index')->with('success', 'Factura creada con éxito.');
    }
    
    

    // Mostrar formulario para editar factura
    public function edit(Factura $factura)
    {
        $pacientes = Paciente::all();
        $clientes = Cliente::all()->map(function ($cliente) {
            return [
                'id' => $cliente->id,
                'razon_social' => $cliente->razon_social ?: ($cliente->nombres . ' ' . $cliente->apellidos)
            ];
        });
        $biologicos = Biologico::all();
        $muestras = Muestra::all();
        $tiposServicios = TipoServicio::all();
        $estados = EstadoFactura::all();
    
        return view('facturas.edit', compact('factura', 'pacientes', 'clientes', 'biologicos', 'muestras', 'tiposServicios', 'estados'));
    }
    
    public function show($id)
    {
        $factura = Factura::with(['tipoServicio', 'estado', 'paciente', 'cliente', 'detalles.biologico', 'detalles.muestra'])
            ->findOrFail($id);
    
        $biologicos = Biologico::all();
        $muestras = Muestra::all();
    
        return view('facturas.show', compact('factura', 'biologicos', 'muestras'));
    }
    
    
    // Actualizar factura
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_servicio_id' => 'required|exists:tipos_servicio,id',
            'estado_id' => 'required|exists:estados_factura,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'cliente_id' => 'required|exists:clientes,id',
            'detalles' => 'nullable|array', // Permite detalles vacíos o nulos
            'detalles.*.tipo_item' => 'nullable|string|in:biologico,muestra',
            'detalles.*.cantidad' => 'nullable|integer|min:1',
            'detalles.*.precio_unitario' => 'nullable|numeric|min:0',
            'detalles.*.subtotal' => 'nullable|numeric|min:0',
        ]);
    
        // Encuentra la factura y actualiza los detalles
        $factura = Factura::findOrFail($id);
        $factura->update($request->only(['tipo_servicio_id', 'estado_id', 'paciente_id', 'cliente_id']));
    
        // Procesar y actualizar detalles (si es necesario)
        if ($request->has('detalles')) {
            foreach ($request->detalles as $detalle) {
                // Actualizar los detalles de la factura aquí
            }
        }
    
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }
    // Eliminar factura
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada con éxito.');
    }
}
