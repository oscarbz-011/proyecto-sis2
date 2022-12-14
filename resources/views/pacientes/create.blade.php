@include('components.nav')

<div class="container">
    <!--div class="jumbotron jumbotron-fluid"-->

    @if (count($errors)>0)
    <br>
    <div class="alert alert-danger" role="alert">
        <u>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </u>
    </div>
    @endif

    <h1>Nuevo Paciente</h1>
    <form
        action="{{url('/pacientes')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
                <label for="race">Raza</label>
                <input type="text" class="form-control" name="race" id="race">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="age">Edad</label>
                <input type="number" class="form-control" name="age" id="age">
            </div>

            <div class="form-group col-md-6">
                <label for="relatives">Dueño</label>
                <select class="form-select" aria-label="Default select example" name="relatives_id">

                    @foreach($relatives as $item)
                         <option value="{{ $item->id_relative}}">{{$item->name}}</option>
                     @endforeach

                 </select>
             </div>

        </div>
        {{--permiso de admin--
        <div class="form-group col-md-6">
            <label for="users_id">Username</label>
            <select class="form-select" aria-label="Default select example" name="users_id">
                @foreach($lista_user as $item)
                    <option value="{{ $item->id_user }}">{{ $item->username }}</option>
                @endforeach
            </select>
        </div>
        --}}
    {{-- permiso de cliente --}}



    {{--<input  type="text" class="form-control" name="users_id" value="{{ auth::user()->id_user }}"> --}}

        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
        @role('admin')
        <a class="pull-right" href="{{route('pacientes.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
        @endrole
        @role('cliente')
        <a class="pull-right" href="{{route('perfil.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
        @endrole

    </form>

</div>
    </div>
