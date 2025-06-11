<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso de la edicion') }} {{ $edicion->curso_escolar }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <a href="{{ route('ediciones.index') }}" class="button primary">Volver a Ediciones</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">URL</th>
                                <th class="px-4 py-2">Edicion</th>
                                <th class="px-4 py-2">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $curso->url }}</td>
                                    <td class="border px-4 py-2">{{ $edicion->curso_escolar }}</td>
                                    <td class="border px-4 py-2">

                                        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                    <td class="border px-4 py-2" colspan="3">
                                        <a href="{{ route('cursos.show', $curso) }}" class="btn btn-sm btn-primary">Ver Curso</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

