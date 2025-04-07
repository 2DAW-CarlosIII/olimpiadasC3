<div class="col-12">
    <select name="centro" id="centro" class="js-example-basic-single" required>
        <option value="" default>- Selecciona tu centro -</option>
        @foreach ($centros as $centro)
            <option value="{{ $centro->id }}">{{ $centro->muncen }} | {{ $centro->dencen }}</option>
        @endforeach
    </select>
</div>
