<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('resultados.create') }}" class="button primary">Crear Palmarés</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Edición</th>
                                <th class="px-4 py-2">Palmarés</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $edicion->curso_escolar }}</td>
                                <td class="border px-4 py-2">{!! $edicion->resultados->palmares !!}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('resultados.edit', $edicion->resultados) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('resultados.destroy', $edicion->resultados) }}" method="POST" class="inline">
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
