@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar datos de la derivacion</h1>
                <form
                    action="{{url('derivaciones/'.$transfers->id_transfer)}}"
                    method="post"
                    enctype="multipart/from-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="description">Descripcion</label>
                            <input
                                type="text"
                                class="form-control"
                                name="description"
                                id="description"
                                value="{{$transfers->description}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hospital">Hospital</label>
                            <input
                                type="text"
                                class="form-control"
                                name="hospital"
                                id="hospital"
                                value="{{$transfers->hospital}}">
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

                            <label for="date">Fecha</label>
                            <input
                                type="date"
                                class="form-control"
                                name="date"
                                id="date"
                                value="{{$transfers->date}}">

                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="pull-right" href="{{route('derivaciones.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
