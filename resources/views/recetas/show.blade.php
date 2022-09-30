@include('components.nav')
<div class="container">

    <h1>Detalle de la receta</h1>
    <label for="details">Detalles</label>
    <input type="text" class="form-control" name="details" id="details" value="{{$prescriptions->details}}" disabled="true">
    <br>
    <label for="patients_id">Paciente</label>
    <input type="text" class="form-control" name="patients_id" id="patients_id" value="{{$prescriptions->patient->name}}" disabled="true">
    <br>
    <label for="medicines_id">Medicamento</label>
    <input type="text" class="form-control" name="medicines_id" id="medicines_id" value="{{$prescriptions->patient->name}}" disabled="true">
    <br>

    <br>
    <div class="d-flex justify-content-between">
        <a href="{{route('recetas.index')}}">
            <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
    </div>
</div>

