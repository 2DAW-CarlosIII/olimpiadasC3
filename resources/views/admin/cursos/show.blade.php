<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso ') . $curso->nombre }}
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
                                    <th class="px-4 py-2">Edicion</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="border px-4 py-2">{{ $curso->edicion->curso_escolar }}</td>
                                <td class="border px-4 py-2">&nbsp;</td>
                            </tr>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2" colspan="1">Nombre</th>
                                    <th class="px-4 py-2">URL</th>
                                    <th class="px-4 py-2">Acciones</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $curso->url }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                        <a href="{{ route('ediciones.cursos.index', ['edicion' => $curso->edicion]) }}"
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
