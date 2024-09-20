<?php

namespace App\Http\Controllers;

use App\Models\EstadoFactura;
use Illuminate\Http\Request;

class EstadoFacturaController extends Controller
{
    public function index()
    {
        $estados = EstadoFactura::all();
        return view('estados_factura.index', compact('estados'));
    }

    public function create()
    {
        return view('estados_factura.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        EstadoFactura::create($request->all());
        return redirect()->route('estados_factura.index')->with('success', 'Estado de factura creado.');
    }

    public function edit($id)
    {
        $estadoFactura = EstadoFactura::findOrFail($id);
        return view('estados_factura.edit', compact('estadoFactura'));
    }
    

    public function update(Request $request, $id)
    {
        $estadoFactura = EstadoFactura::findOrFail($id);
        $estadoFactura->update($request->all());
    
        return redirect()->route('estados_factura.index')->with('success', 'Estado de factura actualizado exitosamente.');
    }
    

    public function destroy($id)
    {
        $estadoFactura = EstadoFactura::findOrFail($id);
        $estadoFactura->delete();
    
        return redirect()->route('estados_factura.index')->with('success', 'Estado de factura eliminado exitosamente.');
    }
    
}
