
@include('components.nav')


<br>
<div class="container">
    <h1>Detalle del Familiar</h1>
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$relative->name}}" disabled="true">
    <br>
    <label for="surname">Apellido</label>
    <input type="text" class="form-control" name="surname" id="surname" value="{{$relative->surname}}" disabled="true">
    <br>
    <label for="document">Ci</label>
    <input type="text" class="form-control" name="document" id="document" value="{{$relative->document}}" disabled="true">
    <br>
    <label for="address">Direccion</label>
    <input type="text" class="form-control" name="address" id="address" value="{{$relative->address}}" disabled="true">
    <br>
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" name="phone" id="phone" value="{{$relative->phone}}" disabled="true">
    <br>
    <label for="users_id">Username</label>
    <input type="text" class="form-control" name="users_id" id="users_id" value="{{$relative->user->username}}" disabled="true">
    <br>
    <label for="">Mascota</label>

        {{--<input type="text" class="form-control" value="{{$patient->name}}" disabled="true">--}}
        @foreach ($patient as $p)
        
        @if($p->relatives_id == $relative->id_relative)
        {
            <input type="text" class="form-control" value="{{$p->name}}" disabled="true">
        }
        @else

        @endif
        @endforeach
    <br>
    <br>
    {{--
    <label for="curso_id">Dueño</label>
    <input type="text" class="form-control" name="curso_id" id="curso_id" value="{{$alumnos->curso->nombre}}" disabled="true">
    --}}
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('familiares.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

