<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patrocinadores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('patrocinadores.create') }}" class="button primary">Crear Patrocinador</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Logotipo</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patrocinadores as $patrocinador)
                                <tr>
                                    <td class="border px-4 py-2">{{ $patrocinador->id }}</td>
                                    <td class="border px-4 py-2">{{ $patrocinador->nombre }}</td>
                                    <td class="border px-4 py-2">
                                        <img src="{{ asset('storage/' . $patrocinador->logotipo) }}" alt="{{ $patrocinador->nombre }}" class="h-12">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('patrocinadores.edit', $patrocinador) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('patrocinadores.destroy', $patrocinador) }}" method="POST" class="inline">
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
