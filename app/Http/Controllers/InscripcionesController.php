<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscripcionesController extends Controller
{
    public function store(Request $request)
    {
        // Documentación de la validación https://laravel.com/docs/10.x/validation#manually-creating-validators
        $validator = Validator::make($request->all(), [
            'centro' => 'required|numeric',
            'prof_resp' => 'required|string|max:255',
            'email_prof_resp' => 'required|email|max:255',
            'ciclo' => 'required|numeric',
            'categoria' => 'required|numeric',
            'grupo' => 'required|string|max:255',
            'nombre.*' => 'nullable|string|max:255',
            'dni.*' => 'nullable|string|max:255',
        ]);

        // Validación adicional https://laravel.com/docs/10.x/validation#performing-additional-validation
        $validator->after(function ($validator) {
            $validated = $validator->validated();
            $categoriasByGrado = [
                1 => [3, 4], // 'fp_basica'
                2 => [1, 2, 3, 4], // 'fp_grado_medio'
                3 => [2, 3, 4], // 'fp_grado_superior'
            ];
            $cicloSelected = Ciclo::find($validated['ciclo']);
            $categoriaSelected = $validated['categoria'];
            $gradoSelected = $cicloSelected->grado;
            if (!in_array($categoriaSelected, $categoriasByGrado[$gradoSelected->id])) {
                $validator->errors()->add(
                    'categoria', 'Los estudiantes del grado elegido no pueden inscribirse en la categoría seleccionada.'
                );
            }
            $alumnosMaximo = [3,3,10,7];
            // contar únicamente los nombres no null
            $alumnosEnviados = array_filter($validated['nombre'], function ($value) {
                return !is_null($value);
            });
            if (count($alumnosEnviados) > $alumnosMaximo[$categoriaSelected]) {
                $validator->errors()->add(
                    'alumnos', 'La categoría seleccionada no admite más de ' . $alumnosMaximo[$categoriaSelected] . ' estudiantes.'
                );
            }
        });

        if ($validator->fails()) {
            return redirect(route('home'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Guardar los datos en la base de datos

        return redirect()->route('home')->with('success', 'Inscripción realizada correctamente.<br />Recibirá un correo electrónico con la confirmación de la inscripción.');
    }
}
