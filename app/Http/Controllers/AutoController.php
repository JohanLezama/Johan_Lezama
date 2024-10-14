<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoController extends Controller
{
    /**
     * Muestra una lista de todos los autos.
     */
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    /**
     * Muestra el formulario para crear un nuevo auto.
     */
    public function create()
    {
        return view('autos.create');
    }

    /**
     * Almacena un nuevo auto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'caracteristicas' => 'required|string|max:150',
            'precio' => 'required|numeric',
            'imagen' => 'required|image|max:2048', // La imagen es obligatoria
        ]);

        // Crear un nuevo registro en la base de datos sin la imagen aún
        $auto = new Auto();
        $auto->nombre = $request->nombre;
        $auto->caracteristicas = $request->caracteristicas;
        $auto->precio = $request->precio;

        // Verificar si hay una imagen y guardarla
        if ($request->hasFile('imagen')) {
            // Guardar la imagen con un nombre único basado en la hora actual
            $nombreArchivo = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $rutaImagen = $request->file('imagen')->storeAs('public/img', $nombreArchivo);
            
            // Asignar la ruta de la imagen al campo 'imagen'
            $auto->imagen = '/img/' . $nombreArchivo;
        }

        // Guardar el auto en la base de datos
        $auto->save();

        return redirect()->route('autos.index')->with('success', 'Coche creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un auto.
     */
    public function edit(Auto $auto)
    {
        return view('autos.edit', compact('auto'));
    }

    /**
     * Actualiza los datos de un auto en la base de datos.
     */
    public function update(Request $request, Auto $auto)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'caracteristicas' => 'required|string|max:150',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048', // La imagen es opcional en la actualización
        ]);

        // Si hay una nueva imagen, eliminar la anterior y guardar la nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior del almacenamiento
            Storage::disk('public')->delete($auto->imagen);

            // Guardar la nueva imagen
            $nombreArchivo = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->storeAs('public/img', $nombreArchivo);
            $auto->imagen = '/img/' . $nombreArchivo;
        }

        // Actualizar los demás campos del coche
        $auto->update($request->only('nombre', 'caracteristicas', 'precio'));

        return redirect()->route('autos.index')->with('success', 'Coche actualizado exitosamente.');
    }

    /**
     * Elimina un auto de la base de datos.
     */
    public function destroy(Auto $auto)
    {
        // Eliminar la imagen asociada al auto
        if ($auto->imagen) {
            Storage::disk('public')->delete($auto->imagen);
        }

        // Eliminar el registro del coche en la base de datos
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Coche eliminado exitosamente.');
    }
}
