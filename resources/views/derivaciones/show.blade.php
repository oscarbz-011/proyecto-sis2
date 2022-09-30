
@include('components.nav')


<br>
<div class="container">
    <h1>Detalle de la derivacion</h1>
    <label for="description">Descripcion</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$transfers->description}}" disabled="true">
    <br>
    <label for="hospital">Hospital</label>
    <input type="text" class="form-control" name="hospital" id="hospital" value="{{$transfers->hospital}}" disabled="true">
    <br>
    <label for="patients_id">Paciente</label>
    <input type="text" class="form-control" name="patients_id" id="patients_id" value="{{$transfers->patient->name}}" disabled="true">
    <br>
    <label for="date">Fecha</label>
    <input type="text" class="form-control" name="date" id="date" value="{{$transfers->date}}" disabled="true">
    <br>
    <br>
    {{--
    <label for="curso_id">Dueño</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('derivaciones.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

