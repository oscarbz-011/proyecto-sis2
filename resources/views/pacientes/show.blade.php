
@include('components.nav')


<br>
<div class="container">
    <h1>Detalle del Paciente</h1>
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$patient->name}}" disabled="true">
    <br>
    <label for="race">Raza</label>
    <input type="text" class="form-control" name="race" id="race" value="{{$patient->race}}" disabled="true">
    <br>
    <label for="age">edad</label>
    <input type="text" class="form-control" name="age" id="age" value="{{$patient->age}}" disabled="true">
    <br>
    <label for="relatives_id">Familiar</label>
    <input type="text" class="form-control" name="relatives_id" id="relatives_id" value="{{$patient->relative->name}}" disabled="true">
    <br>
    {{--
    <label for="curso_id">Familiar</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('pacientes.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

