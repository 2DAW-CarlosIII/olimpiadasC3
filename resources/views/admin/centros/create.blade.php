<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Centro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('centros.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="codcen" class="block text-gray-700">codcen</label>
                            <input type="text" name="codcen" id="codcen" value="{{ old('codcen') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="dencen" class="block text-gray-700">dencen</label>
                            <input type="text" name="dencen" id="dencen" value="{{ old('dencen') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="col-12">
                            <select name="muncen" id="muncen" class="js-example-basic-single" required>
                                <option value="" default>- Selecciona tu municipio -</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->muncen }}"> {{ $municipio->muncen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select name="titularidad" id="titularidad" class="js-example-basic-single" required>
                                <option value="" default>- Selecciona la titularidad -</option>
                                @foreach ($titularidades as $titularidad)
                                <option value="{{ $titularidad->titularidad }}">{{ $titularidad->titularidad }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="domcen" class="block text-gray-700">domcen</label>
                            <input type="text" name="domcen" id="domcen" value="{{ old('domcen') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="cpcen" class="block text-gray-700">cpcen</label>
                            <input type="text" name="cpcen" id="cpcen" value="{{ old('cpcen') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="loccen" class="block text-gray-700">loccen</label>
                            <input type="text" name="loccen" id="loccen" value="{{ old('loccen') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
