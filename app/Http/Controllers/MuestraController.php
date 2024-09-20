<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    public function index()
    {
        $muestras = Muestra::all();
        return view('muestras.index', compact('muestras'));
    }

    public function create()
    {
        return view('muestras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        Muestra::create($request->all());
        return redirect()->route('muestras.index')->with('success', 'Muestra creada exitosamente.');
    }

    public function edit(Muestra $muestra)
    {
        return view('muestras.edit', compact('muestra'));
    }

    public function update(Request $request, Muestra $muestra)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        $muestra->update($request->all());
        return redirect()->route('muestras.index')->with('success', 'Muestra actualizada exitosamente.');
    }

    public function destroy(Muestra $muestra)
    {
        $muestra->delete();
        return redirect()->route('muestras.index')->with('success', 'Muestra eliminada exitosamente.');
    }
}
