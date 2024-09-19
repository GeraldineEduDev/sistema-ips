<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumentos = [
            'Cédula de Ciudadanía',
            'Cédula de Extranjería',
            'Pasaporte',
            'Tarjeta de Identidad',
            'Otro'
        ];

        return view('clientes.create', compact('tiposDocumentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|string',
            'documento' => 'required|string|unique:clientes,documento',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'razon_social' => 'nullable|string',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email|unique:clientes,email',
            'direccion' => 'nullable|string',
            'tipo_cliente' => 'required|string|in:Persona Natural,Persona Jurídica',
        ]);
    
        Cliente::create($request->all());
    
        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'tipo_documento' => 'required',
        'documento' => 'required|unique:clientes,documento,' . $id,
        'nombres' => 'required',
        'apellidos' => 'required',
        'razon_social' => 'nullable',
        'telefono' => 'nullable',
        'email' => 'nullable|email',
        'direccion' => 'required',
        'tipo_cliente' => 'required',
    ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
