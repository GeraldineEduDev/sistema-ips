<?php

namespace App\Http\Controllers;

use App\Models\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    public function index()
    {
        $tiposServicio = TipoServicio::all();
        return view('tipos_servicio.index', compact('tiposServicio'));
    }

    public function create()
    {
        return view('tipos_servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        TipoServicio::create($request->all());
        return redirect()->route('tipos_servicio.index')->with('success', 'Tipo de servicio creado con éxito.');
    }

    public function edit($id)
    {
        $tipoServicio = TipoServicio::findOrFail($id);
        return view('tipos_servicio.edit', compact('tipoServicio'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        $tipoServicio = TipoServicio::findOrFail($id);
        $tipoServicio->nombre = $request->input('nombre');
        $tipoServicio->save();
    
        return redirect()->route('tipos_servicio.index')->with('success', 'Tipo de servicio actualizado correctamente.');
    }    

    public function destroy($id)
    {
        $tipoServicio = TipoServicio::findOrFail($id);
        $tipoServicio->delete();
    
        return redirect()->route('tipos_servicio.index')->with('success', 'Tipo de servicio eliminado correctamente.');
    }
}
