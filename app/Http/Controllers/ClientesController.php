<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
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
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required|unique:clientes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'direccion' => 'nullable',
            'tipo_cliente' => 'required',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required|unique:clientes,documento,' . $cliente->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'direccion' => 'nullable',
            'tipo_cliente' => 'required',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
