<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participantes del grupo ') . $grupo->nombre }}
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
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2" colspan="2">Nombre</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="border px-4 py-2">{{ $grupo->id }}</td>
                                <td class="border px-4 py-2">{{ $grupo->nombre }}</td>
                                <td class="border px-4 py-2">&nbsp;</td>
                            </tr>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2" colspan="2">Estudiantes</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </tr>
                            </thead>
                            @foreach ($grupo->participantes as $participante)
                                <tr>
                                    <td class="border px-4 py-2">{{ $participante->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $participante->apellidos }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('participantes.edit', $participante) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('participantes.destroy', $participante) }}" method="POST" class="inline">
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
