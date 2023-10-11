
<div class="container">
    <h1>Editar Servicio</h1>
   <form action="{{ route('service.update', $service->id_servicios) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_servicio" value="{{ $service->id_servicio }}">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $service->nombre }}">
            @error('nombre')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="costo_por_m2" value="{{ $service->costo_por_m2 }}">
            @error('precio')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
