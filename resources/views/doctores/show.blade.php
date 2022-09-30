
@include('components.nav')


<br>
<div class="container">
    <div class="col-md-6">


    <h1>Detalle del Doctor</h1>
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$doctors->name}}" disabled="true">
    <br>
    <label for="specialty">Especialidad</label>
    <input type="text" class="form-control" name="specialty" id="specialty" value="{{$doctors->specialty}}" disabled="true">
    </div>
    <br>
    <label for="">Horario</label>
    <div class="d-flex col-md-3">

        @foreach ($doctors->dates as $item)
            <input type="text" class="form-control" value="{{$item->day}}" disabled="true">
        @endforeach
    </div>

    {{--<input type="text" class="form-control" name="" id="" value="{{$dates->day}}" disabled="true">
        --}}
    <br>
    {{--
    <label for="curso_id">Dueño</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('doctores.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

