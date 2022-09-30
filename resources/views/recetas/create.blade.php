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

    <h1>Nueva receta</h1>
    <form
        action="{{url('/recetas')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf


        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="details">Detalles</label>
                <input type="text" class="form-control" name="details" id="details">
            </div>
            <div class="form-group col-md-6">
                <label for="patients_id">Paciente</label>
                <select class="form-select" aria-label="Default select example" name="patients_id">
                    @foreach($patients as $item)
                        <option value="{{ $item->id_patient}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Medicines_id">Medicamento</label>
                <select class="form-select" aria-label="Default select example" name="medicines_id">
                    @foreach($medicines as $item)
                        <option value="{{ $item->id_medicine}}">{{$item->name}}</option>
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
