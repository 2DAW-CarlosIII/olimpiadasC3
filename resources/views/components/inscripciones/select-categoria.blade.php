
<div class="col-12">
    <select name="categoria" id="categoria" disabled required>
        <option value="" default>- Selecciona la categoría en la que participará el grupo/alumno -</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
</div>
