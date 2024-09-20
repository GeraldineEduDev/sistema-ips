<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    /**
     * Store a newly created detail in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'factura_id' => 'required|exists:facturas,id',
            'tipo_item' => 'required|in:biologico,muestra',
            'biologico_id' => 'nullable|exists:biologicos,id',
            'muestra_id' => 'nullable|exists:muestras,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        DetalleFactura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Detalle de factura agregado con éxito.');
    }

    /**
     * Show the form for editing the specified detail.
     */
    public function edit(DetalleFactura $detalleFactura)
    {
        return view('detalles_factura.edit', compact('detalleFactura'));
    }

    /**
     * Update the specified detail in storage.
     */
    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        $request->validate([
            'tipo_item' => 'required|in:biologico,muestra',
            'biologico_id' => 'nullable|exists:biologicos,id',
            'muestra_id' => 'nullable|exists:muestras,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $detalleFactura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Detalle de factura actualizado con éxito.');
    }

    /**
     * Remove the specified detail from storage.
     */
    public function destroy(DetalleFactura $detalleFactura)
    {
        $detalleFactura->delete();

        return redirect()->route('facturas.index')->with('success', 'Detalle de factura eliminado con éxito.');
    }
}
