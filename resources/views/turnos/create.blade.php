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

    <h1>Nuevo turno</h1>
    <form
        action="{{url('/turnos')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf


        {{--<div class="form-group row">--}}
            {{--
            <div class="form-group col-md-6">
                <label for="code">Codigo</label>
                <input type="text" class="form-control" name="code" id="code">
            </div>--}}
            <div class="form-group col-md-12">
                <label for="date">Fecha</label>
                <input type="date" class="form-control" name="date" id="date">


                <label for="">Paciente</label>
                <select class="form-select" aria-label="Default select example" name="patients_id">
                    @foreach($patients as $item)
                        <option value="{{ $item->id_patient}}">{{$item->name}}</option>
                    @endforeach
                </select>


                <label for="">Doctor</label>
                <select class="form-select" aria-label="Default select example" name="doctors_id">
                    @foreach($doctors as $item)
                        <option value="{{ $item->id_doctor}}">{{$item->name}}</option>
                    @endforeach
                </select>


                <br>
                <input type="submit" class="btn btn-primary" value="Guardar">
                <a class="pull-right" href="{{route('turnos.index')}} ">
                <button type="button" class="btn btn-danger">Cancelar</button>
                </a>

            </div>
        </div>
        {{--<div class="form-group row">
            <div class="form-group col-md-6">--}}

            </div>
            {{--<div class="form-group col-md-6">--}}

            </div>
        </div>



    </form>

</div>
    </div>
