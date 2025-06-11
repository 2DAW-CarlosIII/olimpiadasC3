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
                    <a href="{{ route('ediciones.cursos.create', ['curso' => $curso]) }}" class="button primary">Crear Curso</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Edición</th>
                                <th class="px-4 py-2">nombre</th>
                                <th class="px-4 py-2">url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->edicion->curso_escolar }}</td>
                                    <td class="border px-4 py-2">{!! $curso->nombre !!}</td>
                                    <td class="border px-4 py-2">{!! $curso->url !!}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('ediciones.cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('ediciones.cursos.destroy', $curso) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
