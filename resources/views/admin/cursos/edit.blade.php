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
                            <label for="num_olimpiada" class="block text-gray-700">Nº Olimpiada</label>
                            <input type="number" name="num_olimpiada" id="num_olimpiada" value="{{ old('num_olimpiada') ?? $curso->num_olimpiada }}" class="w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="curso_lectivo" class="block text-gray-700">Curso Lectivo</label>
                            <input type="text" name="curso_lectivo" id="curso_lectivo" value="{{ old('curso_lectivo') ?? $curso->curso_lectivo }}" class="w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="curso_moodle_id" class="block text-gray-700">Moodle ID</label>
                            <input type="number" name="curso_moodle_id" id="curso_moodle_id" value="{{ old('curso_moodle_id') ?? $curso->curso_moodle_id }}" class="w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            {{-- Se usa la relación definida en tu modelo --}}
                            <label class="block text-gray-700">Edición ID: {{ $curso->edicion_id }}</label>
                            <input type="hidden" name="edicion_id" value="{{ $curso->edicion_id }}">
                        </div>

                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
