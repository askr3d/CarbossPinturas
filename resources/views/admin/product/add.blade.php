
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
            <input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" placeholder="Precio">
            @error('precio')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="existencia" name="existencia" value="{{ old('existencia') }}" placeholder="Existencia">
            @error('existencia')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
