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

    <h1>Cargar Medicamento</h1>
    <form
        action="{{url('/medicamentos')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
                <label for="brand">Marca</label>
                <input type="text" class="form-control" name="brand" id="brand">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="price">Precio</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="form-group col-md-6">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock">
            </div>
        </div>

        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a class="pull-right" href="{{route('medicamentos.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>

    </form>

</div>
    </div>
