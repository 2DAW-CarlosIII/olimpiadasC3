<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Centros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('centros.create') }}" class="button primary">Crear Centro</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">codcen</th>
                                <th class="px-4 py-2">dencen</th>
                                <th class="px-4 py-2">muncen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($centros as $centro)
                                <tr>
                                    <td class="border px-4 py-2">{{ $centro->codcen }}</td>
                                    <td class="border px-4 py-2">{{ $centro->dencen }}</td>
                                    <td class="border px-4 py-2">{{ $centro->muncen }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('centros.edit', $centro) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('centros.destroy', $centro) }}" method="POST" class="inline">
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
