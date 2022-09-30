
@include('components.nav')


<br>
<div class="container">
    <h1>Detalle del medicamento</h1>
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$medicines->name}}" disabled="true">
    <br>
    <label for="brand">Marca</label>
    <input type="text" class="form-control" name="brand" id="brand" value="{{$medicines->brand}}" disabled="true">
    <br>
    <label for="price">Precio</label>
    <input type="text" class="form-control" name="price" id="price" value="{{$medicines->price}}" disabled="true">
    <br>
    <label for="stock">Stock</label>
    <input type="text" class="form-control" name="stock" id="stock" value="{{$medicines->stock}}" disabled="true">
    <br>
    <br>
    {{--
    <label for="curso_id">Dueño</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('medicamentos.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

