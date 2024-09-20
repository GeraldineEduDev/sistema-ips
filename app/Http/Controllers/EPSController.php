<?php

namespace App\Http\Controllers;

use App\Models\EPS;
use Illuminate\Http\Request;

class EPSController extends Controller
{
    public function index()
    {
        $eps = EPS::all();
        return view('eps.index', compact('eps'));
    }

    public function create()
    {
        return view('eps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'email' => 'nullable|string|max:255|email',
            'tipo' => 'required|string|max:50',
        ]);

        EPS::create($request->all());

        return redirect()->route('eps.index')->with('success', 'EPS creada con éxito.');
    }

    public function edit($id)
    {
        $eps = Eps::findOrFail($id);
        return view('eps.edit', compact('eps'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'tipo' => 'required|string',
        ]);
    
        $eps = Eps::findOrFail($id);
        $eps->update($validatedData);
    
        return redirect()->route('eps.index')->with('success', 'EPS actualizado correctamente.');
    }
    

    public function destroy($id)
    {
        $eps = Eps::findOrFail($id);
        $eps->delete();
    
        return redirect()->route('eps.index')->with('success', 'EPS eliminado correctamente.');
    }
    
}
