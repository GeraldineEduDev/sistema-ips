<?php

namespace App\Http\Controllers;

use App\Models\Biologico;
use Illuminate\Http\Request;

class BiologicosController extends Controller
{
    // Muestra el listado de biológicos
    public function index()
    {
        $biologicos = Biologico::all();
        return view('biologicos.index', compact('biologicos'));
    }

    // Muestra el formulario para crear un nuevo biológico
    public function create()
    {
        return view('biologicos.create');
    }

    // Almacena un nuevo biológico en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'presentacion' => 'required|string|max:100',
            'marca' => 'nullable|string|max:100',
            'laboratorio' => 'nullable|string|max:100',
            'fecha_expiracion' => 'required|date',
            'lote' => 'required|string|max:50',
        ]);

        Biologico::create($request->all());

        return redirect()->route('biologicos.index')->with('success', 'Biológico creado con éxito.');
    }

    // Muestra el formulario para editar un biológico existente
    public function edit(Biologico $biologico)
    {
        return view('biologicos.edit', compact('biologico'));
    }

    // Actualiza un biológico existente en la base de datos
    public function update(Request $request, Biologico $biologico)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'presentacion' => 'required|string|max:100',
            'marca' => 'nullable|string|max:100',
            'laboratorio' => 'nullable|string|max:100',
            'fecha_expiracion' => 'required|date',
            'lote' => 'required|string|max:50',
        ]);

        $biologico->update($request->all());

        return redirect()->route('biologicos.index')->with('success', 'Biológico actualizado con éxito.');
    }

    // Elimina un biológico de la base de datos
    public function destroy(Biologico $biologico)
    {
        $biologico->delete();

        return redirect()->route('biologicos.index')->with('success', 'Biológico eliminado con éxito.');
    }
}
