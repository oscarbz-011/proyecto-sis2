@include('components.nav')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.min.js" integrity="sha512-lxQ4VnKKW7foGFV6L9zlSe+6QppP9B2t+tMMaV4s4iqAv4iHIyXED7O+fke1VeLNaRdoVkVt8Hw/jmZ+XocsXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

    <h1>Mis datos</h1>
    <form
        action="{{url('/familiares')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="users_id">Username</label>
            <select class="form-select" aria-label="Default select example" name="users_id">

                @role('admin')
                    @foreach($lista_user as $item)
                        <option value="{{$item->id_user}}">{{$item->username}}</option>
                    @endforeach
                @endrole
                @role('cliente')
                    <option value="{{ auth::user()->id_user}}">{{auth::user()->username}}</option>
                @endrole
            </select>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
                <label for="surname">Apellido</label>
                <input type="text" class="form-control" name="surname" id="surname">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label for="document">Ci</label>
                <input type="number" class="form-control" name="document" id="document">
            </div>
            <div class="form-group col-md-3">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Telefono</label>
                <input type="number" class="form-control" name="phone" id="phone">
            </div>
        </div>

        {{-- permiso de cliente --}}
        <div class="form-group row">

            {{--Mascota--}}

            <div class="form-group col-md-6">
                <label for="name">Nombre de la mascota</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
                <label for="race">Raza</label>
                <input type="text" class="form-control" name="race" id="race">
            </div>


        </div>
        {{--<input  type="text" class="form-control" name="users_id" value="{{ auth::user()->id_user }}"> --}}
        {{-- DATOS DE LA MASCOTA DEL CLIENTE --}}

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="age">Edad de la mascota</label>
                <input type="number" class="form-control" name="age" id="age">
            </div>

            <div class="form-group col-md-6">
                <label for="relatives">Dueño</label>
                <select class="form-select" aria-label="Default select example" name="relatives_id">
                    @role('admin')
                    @foreach($relatives as $item)
                        <option value="{{ $item->id_relative}}">{{$item->name}}</option>
                    @endforeach
                    @endrole
                    @role('cliente')
                    @foreach($relatives as $item)
                        <option value="{{ $item->id_relative}}">{{$item->name}}</option>
                    @endforeach
                    @endrole
                </select>
            </div>



        {{-- DATOS DE LA MASCOTA DEL CLIENTE --}}


        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a class="pull-right" href="{{route('familiares.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>

    </form>

</div>
    </div>
