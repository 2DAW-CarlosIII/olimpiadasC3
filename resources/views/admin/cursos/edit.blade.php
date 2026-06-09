<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.update', ['curso' => $curso]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="curso_escolar" class="block text-gray-700">Curso Escolar</label>
                            <input type="text" name="curso_escolar" id="curso_escolar" value="{{ old('curso_escolar') ?? $curso->curso_escolar }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="moodle_id" class="block text-gray-700">Moodle_id</label>
                            <input type="text" name="moodle_id" id="moodle_id" value="{{ old('moodle_id') ?? $curso->moodle_id }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="fecha_apertura" class="block text-gray-700">Olimpiadas_id</label>
                            <input type="text" name="olimpiada_id" id="olimpiada_id" value="{{ old('olimpiada_id') ?? $curso->olimpiada_id }}" class="w-full border-gray-300 rounded-md">
                        </div>

                        <!-- Gestión de edicion  de ese curso-->
                        <div class="mb-4">
                            <h3 class="text-gray-700">Edición</h3>
                            @foreach (\App\Models\Edicion::all() as $edicion)
                                <div class="flex items-center mb-2">
                                    <!-- Checkbox para seleccionar la edición -->
                                    <input type="checkbox" name="ediciones[{{ $edicion->id }}][seleccionada]" id="edicion_{{ $edicion->id }}" value="1"
                                        {{ $curso->edicion_id == $edicion->id ? 'checked' : '' }}
                                        class="mr-2">
                                    <label for="edicion_{{ $edicion->id }}" class="text-gray-700">{{ $edicion->curso_escolar }}</label>

                                    <!-- Campo numérico para el número de olimpiadas -->
                                    <input type="number" name="ediciones[{{ $edicion->id }}][num_olimpiadas]" value="{{ $edicion->num_olimpiadas ?? '' }}"
                                        class="ml-4 w-20 border-gray-300 rounded-md" placeholder="Nº">
                                </div>
                            @endforeach
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.ediciones._files', ['edicion' => $edicion])
</x-app-layout>
