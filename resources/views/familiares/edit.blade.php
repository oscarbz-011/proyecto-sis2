@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar datos del familiar</h1>
                <form
                    action="{{url('familiares/'.$relative->id_relative)}}"
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
                                value="{{$relative->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname">Apellido</label>
                            <input
                                type="text"
                                class="form-control"
                                name="surname"
                                id="surname"
                                value="{{$relative->surname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-3">
                            <label for="document">Document</label>
                            <input
                                type="number"
                                class="form-control"
                                name="document"
                                id="document"
                                value="{{$relative->document}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="address">Direccion</label>
                            <input
                                type="text"
                                class="form-control"
                                name="address"
                                id="address"
                                value="{{$relative->address}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Telefono</label>
                            <input
                                type="number"
                                class="form-control"
                                name="phone"
                                id="phone"
                                value="{{$relative->phone}}">
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
                    <a class="pull-right" href="{{route('familiares.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
