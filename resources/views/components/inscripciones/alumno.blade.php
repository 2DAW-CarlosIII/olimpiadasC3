
    @for ($i = 0; $i < 10; $i++)
        <div class="col-6 col-12-xsmall {{ $oldNombre && isset($oldNombre[$i]) ? '' : 'oculto' }} alumnos">
            <input type="text" name="nombre[{{ $i }}]" id="nombre{{ $i }}" value="{{ $oldNombre ? $oldNombre[$i] : '' }}" placeholder="Nombre Alumno {{ $i }}" />
        </div>
        <div class="col-6 col-12-xsmall {{ $oldApellido && isset($oldApellido[$i]) ? '' : 'oculto' }}  apellidos">
            <input type="text" name="apellido[{{ $i }}]" id="apellido{{ $i }}" value="{{ $oldApellido ? $oldApellido[$i] : '' }}" placeholder="Apellido Alumno {{ $i }}" />
        </div>
    @endfor
