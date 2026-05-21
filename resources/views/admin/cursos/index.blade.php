<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso') }} de la Edición {{ $edicion->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('ediciones.cursos.create', ['edicion' => $edicion]) }}"
                        class="button primary mb-4">Crear Curso</a>
                    <a href="{{ route('ediciones.index') }}" class="button primary">Volver a Ediciones</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nº Olimpiada</th>
                                <th class="px-4 py-2">Curso Lectivo</th>
                                <th class="px-4 py-2">Edición ID</th>
                                <th class="px-4 py-2">Moodle ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($curso)
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->num_olimpiada }}</td>
                                    <td class="border px-4 py-2">{{ $curso->curso_lectivo }}</td>
                                    <td class="border px-4 py-2">{{ $curso->curso_moodle_id }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $curso) }}"
                                            class="btn btn-sm btn-warning">Editar</a>

                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Borrar curso?')">Eliminar</button>
                                        </form>

                                        <a href="{{ route('cursos.show', $curso) }}"
                                            class="btn btn-sm btn-primary">Ver</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="border px-4 py-2 text-center">
                                        No hay ningún curso asignado a esta edición.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
