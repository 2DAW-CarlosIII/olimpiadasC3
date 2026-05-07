<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso ') . $curso->num_olimpiada . __(' de la Edición ') . $curso->edicion_id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <tbody>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID Edición</th>
                                    <th class="px-4 py-2">Referencia</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="border px-4 py-2">{{ $curso->edicion_id }}</td>
                                <td class="border px-4 py-2">Edición Asociada</td>
                                <td class="border px-4 py-2">&nbsp;</td>
                            </tr>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2" colspan="1">Nº Olimpiada</th>
                                    <th class="px-4 py-2">Curso Lectivo</th>
                                    <th class="px-4 py-2">Acciones</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->num_olimpiada }}</td>
                                    <td class="border px-4 py-2">{{ $curso->curso_lectivo }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                        <a href="{{ route('ediciones.cursos.index', ['edicion' => $curso->edicion_id]) }}"
                                             class="btn btn-sm btn-warning">
                                             Volver al listado
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
