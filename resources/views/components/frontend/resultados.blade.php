<div class="container">
    <h3>Resultados</h3>
    <section>
        <div>
        @if ($palmares)
            <div>{!! $palmares !!}</div> <!-- asi se hace para que no escape el html -->
        @else
            <p>No hay resultados para esta edicion</p>
        @endif
        </div>
    </section>
</div>