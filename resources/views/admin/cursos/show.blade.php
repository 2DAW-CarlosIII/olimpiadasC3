<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos ') . $curso->edicion_id . __(' del  ') . $curso->edicion_id }}
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
                                    <th class="px-4 py-2" colspan="1">id</th>
                                    <th class="px-4 py-2">curso_escolar</th>
                                    <th class="px-4 py-2">olimpiada_id</th>
                                    <th class="px-4 py-2">edicion_id</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->id }}</td>
                                    <td class="border px-4 py-2">{{ $curso->curso_escolar }}</td>
                                    <td class="border px-4 py-2">{{ $curso->olimpiada_id }}</td>
                                    <td class="border px-4 py-2">{{ $curso->edicion_id }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                        <a href="{{ route('cursos.index', ['curso' => $curso->edicion_id]) }}"
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
