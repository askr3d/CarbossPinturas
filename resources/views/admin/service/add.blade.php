
<div class="container">
    <h1>Agregar producto</h1>
   <form action="add" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('name') }}" placeholder="Nombre" >
            @error('nombre')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="precio" name="costo_por_m2" value="{{ old('costo_por_m2') }}" placeholder="Costo por m2">
            @error('costo_por_m2')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
