
    @for ($i = 0; $i < 10; $i++)
        <div class="col-6 col-12-xsmall oculto alumnos">
            <input type="text" name="nombre[{{ $i }}]" id="nombre{{ $i }}" placeholder="Nombre Alumno {{ $i }}" />
        </div>
        <div class="col-6 col-12-xsmall oculto dnis">
            <input type="text" name="dni[{{ $i }}]" id="dni{{ $i }}" placeholder="DNI Alumno {{ $i }}" />
        </div>
    @endfor
