<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="moodle_id" class="block text-gray-700">Moodle_id</label>
                            <input type="number" name="moodle_id" id="moodle_id" value="{{ old('moodle_id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="curso_escolar" class="block text-gray-700">Curso escolar</label>
                            <input type="text" name="curso_escolar" id="curso_escolar" value="{{ old('curso_escolar') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="olimpiada_id" class="block text-gray-700">Olimpiada_id</label>
                            <input type="number" name="olimpiada_id" id="olimpiada_id" value="{{ old('olimpiada_id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700">Edición_id</label>
                            <input type="number" name="edicion_id" id="edicion_id" value="{{ old('edicion_id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <h3 class="text-gray-700">Edición</h3>
                            @foreach (\App\Models\Edicion::all() as $edicion)
                                <div class="flex items-center mb-2">
                                    <!-- Checkbox para seleccionar la edición -->
                                    <input type="checkbox" name="ediciones[{{ $edicion->id }}][seleccionada]" id="edicion_{{ $edicion->id }}" value="1"
                                        {{ old('curso_escolar') == $edicion->curso_escolar ? 'checked' : '' }}
                                        class="mr-2">
                                    <label for="edicion_{{ $edicion->id }}" class="text-gray-700">{{ $edicion->curso_escolar }}</label>

                                </div>
                            @endforeach
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
