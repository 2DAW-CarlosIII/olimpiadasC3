<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grupos') }} de la edicion {{ $edicion->curso_escolar}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <a href="{{ route('ediciones.index') }}" class="button primary">Volver a Ediciones</a>
                    <table class="table-auto w-full">
                        <tbody>
                            @foreach ($grupos as $grupo)
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Nombre</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td class="border px-4 py-2">{{ $grupo->id }}</td>
                                    <td class="border px-4 py-2">{{ $grupo->nombre }}</td>
                                    <td class="border px-4 py-2">&nbsp;</td>
                                    <td class="border px-4 py-2" rowspan="5">
                                        <a href="{{ route('grupos.edit', $grupo) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('grupos.destroy', $grupo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                        <br />
                                        <a href="{{ route('grupos.crearUsuarioMoodle', $grupo) }}" class="btn btn-sm btn-warning">Crear Usuario Moodle</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2"><b>Centro:</b><br /> {{ $grupo->centro->dencen }}</td>
                                    <td class="border px-4 py-2">
                                        <b>Tutor:</b><br />
                                        <a href="mailto:{{ $grupo->tutor()->first()->email }}">{{ $grupo->tutor()->first()->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2"><b>username Moodle:</b><br /> {{ $grupo->abreviatura }}</td>
                                    <td class="border px-4 py-2"><b>password Moodle:</b><br />{{ $grupo->password }}</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2"><b>Ciclo:</b><br /> {{ $grupo->ciclo->nombre }}</td>
                                    <td class="border px-4 py-2"><b>Categoria:<br /></b> {{ $grupo->categoria->nombre }}</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2" colspan="3">
                                        <a href="{{ route('grupos.show', ['grupo' => $grupo]) }}" class="btn btn-sm btn-primary">Ver Grupo</a>
                                        <a href="{{ route('grupos.participantes.index', $grupo) }}" class="btn btn-sm btn-warning">Ver participantes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @can('grupos.createUsersMoodle')
                        <br />
                        <a href="{{ route('grupos.crearUsuariosMoodle') }}" class="btn btn-sm btn-warning">Crear Todos los Usuarios Moodle</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
