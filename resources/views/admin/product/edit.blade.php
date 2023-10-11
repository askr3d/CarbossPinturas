
<div class="container">
    <h1>Editar Producto</h1>
   <form action="{{ route('product.update', $product->id_producto) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_producto" value="{{ $product->id_producto }}">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $product->nombre }}">
            @error('nombre')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{ $product->precio }}">
            @error('precio')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $product->descripcion }}</textarea>
            @error('descripcion')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="existencia">Existencia:</label>
            <input type="text" class="form-control" id="existencia" name="existencia" value="{{ $product->existencia }}">
            @error('existencia')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
