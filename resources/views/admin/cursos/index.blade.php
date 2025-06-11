<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('ediciones.cursos.create', ['edicion' => $edicion]) }}" class="button primary mb-4">Crear Curso</a>
                    <a href="{{ route('ediciones.index') }}" class="button primary">Volver a Ediciones</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Url</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td class="border px-4 py-2">{{ $cursos->id }}</td>
                                    <td class="border px-4 py-2">{{ $cursos->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $cursos->url }}</td>

                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $cursos) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $cursos) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
