<form method="post" action="https://olimpiadas.cifpcarlos3.es/wp-admin/admin-post.php">
    <input type="hidden" name="action" value="manejar_formulario">
    <div class="row gtr-uniform">
        <div class="col-12"><input type="checkbox" name="terminos" id="terminos" required><label for="terminos">Hemos leído y aceptado las bases</label>
            <ul>
                <li><a href="{{ asset('/ediciones/edicion2025/basesOlimpiada.pdf') }}">Bases de la Olimpiada Informática</a></li>
                <li><a href="{{ asset('/ediciones/edicion2025/basesModding.pdf') }}">Bases del Modding Regional</a></li>
                <li><a href="{{ asset('/ediciones/edicion2025/basesC3Gamer.pdf') }}">Bases del C3Gamer</a></li>
            </ul>
        </div>
        <x-inscripciones.select-centro />
        <div class="col-12">
            <input type="text" name="prof_resp" id="prof_resp" placeholder="Profesor responsable*" required/>
        </div>
        <div class="col-12">
            <input type="text" name="email_prof_resp" id="email_prof_resp" placeholder="Correo Profesor responsable*" required/>
        </div>
        <x-inscripciones.select-ciclo />

        <x-inscripciones.select-categoria />

        <div class="col-12 oculto grupo">
            <input type="text" name="grupo" id="grupo" placeholder="Nombre del grupo*" required/>
        </div>

        <x-inscripciones.alumno />

        <div class="col-12">
            <ul class="actions">
                <li><input type="submit" class="primary" value="Enviar Inscripción" /></li>
                <li><input type="reset" value="Reiniciar Formulario" /></li>
            </ul>
        </div>
        <span>(Los campos con * son obligatorios)</span>
    </div>
</form>
