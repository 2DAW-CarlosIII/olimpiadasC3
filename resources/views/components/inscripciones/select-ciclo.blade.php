<div class="col-12">
    <select name="ciclo" id="ciclo" required>
        <option value="" default>- Selecciona la formación profesional del grupo/alumno -</option>
        @foreach ($ciclos as $ciclo)
            <option value="{{ $ciclo->id }}" class="{{ $ciclo->grado_id }}">{{ $ciclo->nombre }}</option>
        @endforeach
    </select>
</div>
