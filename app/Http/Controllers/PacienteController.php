<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\EPS;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Mostrar todos los pacientes
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    // Mostrar el formulario para crear un nuevo paciente
    public function create()
    {
        $epsList = EPS::all();
        return view('pacientes.create', compact('epsList'));
    }

    // Guardar un nuevo paciente
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|string|max:50',
            'documento' => 'required|string|max:100|unique:pacientes',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:50',
            'email' => 'nullable|string|email|max:255',
            'tipo_sangre' => 'nullable|string|max:10',
            'expedicion_documento' => 'required|date',
            'alergias' => 'nullable|string',
            'sexo' => 'required|string|max:10',
            'genero' => 'required|string|max:50',
            'eps_id' => 'required|exists:eps,id',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente agregado exitosamente');
    }

    // Mostrar un paciente específico
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    // Mostrar el formulario para editar un paciente
    public function edit(Paciente $paciente)
    {
        $epsList = EPS::all(); // Obtener todas las EPS
        return view('pacientes.edit', compact('paciente', 'epsList'));
    }

    // Actualizar un paciente
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'tipo_documento' => 'required|string|max:50',
            'documento' => 'required|string|max:100|unique:pacientes,documento,' . $paciente->id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:50',
            'email' => 'nullable|string|email|max:255',
            'tipo_sangre' => 'nullable|string|max:10',
            'expedicion_documento' => 'required|date',
            'alergias' => 'nullable|string',
            'sexo' => 'required|string|max:10',
            'genero' => 'required|string|max:50',
            'eps_id' => 'required|exists:eps,id',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado con éxito.');
    }

    // Eliminar un paciente
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente');
    }
}
