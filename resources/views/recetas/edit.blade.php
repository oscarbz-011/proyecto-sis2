@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar receta</h1>
                <form
                    action="{{url('recetas/'.$prescriptions->id_prescription)}}"
                    method="post"
                    enctype="multipart/from-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="details">Detalles</label>
                            <input
                                type="text"
                                class="form-control"
                                name="details"
                                id="details"
                                value="{{$prescriptions->details}}">
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
                            <label for="medicines_id">Medicamento</label>
                            <select class="form-select" aria-label="Default select example" name="medicines_id">
                                @foreach($medicines as $item)
                                <option value="{{ $item->id_medicine }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="pull-right" href="{{route('recetas.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
