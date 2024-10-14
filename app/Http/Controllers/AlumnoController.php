<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all(); // Trae todos los registros de la base de datos
        return view('alumnos.index', compact('alumnos')); // Carga la vista 'index'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::all(); // Trae todos los registros de la base de datos
        return view('alumnos.create', compact('alumnos')); // Carga la vista 'create' con la tabla de registros
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Crear el registro
        Alumno::create($request->all());

        // Redirigir a la vista 'index' con un mensaje de éxito
        return redirect()->route('alumnos.index')->with('success', 'Tu registro ha sido exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Actualizar el registro
        $alumno->update($request->all());

        // Redirigir a la vista 'create' con un mensaje de éxito
        return redirect()->route('alumnos.create')->with('success', 'El registro ha sido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        // Redirigir a la vista 'create' con un mensaje de éxito
        return redirect()->route('alumnos.create')->with('success', 'El registro ha sido eliminado exitosamente');
    }
}
