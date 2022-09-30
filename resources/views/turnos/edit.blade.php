@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar turno</h1>
                <form
                    action="{{url('turnos/'.$consult->id_consult)}}"
                    method="post"
                    enctype="multipart/from-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="code">Codigo</label>
                            <input
                                type="text"
                                class="form-control"
                                name="code"
                                id="code"
                                value="{{$consult->code}}" disabled="true">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dates_id">Fecha</label>
                            <input
                                type="date"
                                class="form-control"
                                name="date"
                                id="date"
                                value="{{$consult->date}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="patients_id">Paciente</label>
                            <select class="form-select" aria-label="Default select example" name="patients_id">
                                @foreach($patients as $item)
                                <option value="{{ $item->id_patient }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctors_id">Doctor</label>
                            <select class="form-select" aria-label="Default select example" name="doctors_id">
                                @foreach($doctors as $item)
                                <option value="{{ $item->id_doctor }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="pull-right" href="{{route('turnos.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
