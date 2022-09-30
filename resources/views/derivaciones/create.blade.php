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

    <h1>Nueva Derivacion</h1>
    <form
        action="{{url('/derivaciones')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="form-group col-md-6">
                <label for="hospital">Hospital</label>
                <input type="text" class="form-control" name="hospital" id="hospital">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="patients_id">Paciente</label>
            <select class="form-select" aria-label="Default select example" name="patients_id">
                @foreach($patients as $item)
                    <option value="{{ $item->id_patient }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group col-md-6">
                <label for="date">Fecha</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
        </div>

    {{--<input  type="text" class="form-control" name="users_id" value="{{ auth::user()->id_user }}"> --}}

        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a class="pull-right" href="{{route('derivaciones.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>

    </form>

</div>
    </div>
