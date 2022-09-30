@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar datos del medicamento</h1>
                <form
                    action="{{url('medicamentos/'.$medicines->id_medicine)}}"
                    method="post"
                    enctype="multipart/from-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                value="{{$medicines->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand">Marca</label>
                            <input
                                type="text"
                                class="form-control"
                                name="brand"
                                id="brand"
                                value="{{$medicines->brand}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="price">Precio</label>
                            <input
                                type="number"
                                class="form-control"
                                name="price"
                                id="price"
                                value="{{$medicines->price}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stock">Stock</label>
                            <input
                                type="number"
                                class="form-control"
                                name="stock"
                                id="stock"
                                value="{{$medicines->stock}}">
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
    </div>
</div>
