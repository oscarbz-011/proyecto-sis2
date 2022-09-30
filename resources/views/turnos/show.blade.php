@include('components.nav')
<div class="container">

    <h1>Detalle del turno</h1>
    <label for="code">Codigo</label>
    <input type="text" class="form-control" name="code" id="code" value="{{$consult->code}}" disabled="true">
    <br>
    <label for="date">Fecha</label>
    <input type="text" class="form-control" name="date" id="date" value="{{$consult->date}}" disabled="true">
    <br>
    <label for="patients_id">Paciente</label>
    <input type="text" class="form-control" name="patients_id" id="patients_id" value="{{$consult->patient->name}}" disabled="true">
    <br>
    <label for="doctors_id">Doctor</label>
    <input type="text" class="form-control" name="doctors_id" id="doctors_id" value="{{$consult->doctor->name}}" disabled="true">
    <br>
    {{--
    <label for="curso_id">Familiar</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('turnos.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

