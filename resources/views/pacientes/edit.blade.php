@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar datos del Paciente</h1>
                <form
                    action="{{url('pacientes/'.$patient->id_patient)}}"
                    method="post"
                    enctype="multipart/from-data">
                    {{method_field('PATCH')}}
                    @csrf
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                value="{{$patient->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="race">Raza</label>
                            <input
                                type="text"
                                class="form-control"
                                name="race"
                                id="race"
                                value="{{$patient->race}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-3">
                            <label for="age">Edad</label>
                            <input
                                type="number"
                                class="form-control"
                                name="age"
                                id="age"
                                value="{{$patient->age}}">
                        </div>

                    </div>
                    {{--
                    <div class="form-group col-md-6">
                        <label for="users_id">Username</label>
		                <select class="form-select" aria-label="Default select example" name="curso_id">
			                @foreach($lista_user as $item)
			                <option value="{{ $item->id_user }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="pull-right" href="{{route('pacientes.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
