@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                <h1>Editar datos del doctor</h1>
                <form
                    action="{{url('doctores/'.$doctors->id_doctor)}}"
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
                                value="{{$doctors->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="specialty">Specialty</label>
                            <input
                                type="text"
                                class="form-control"
                                name="specialty"
                                id="specialty"
                                value="{{$doctors->specialty}}">
                        </div>
                    </div>
                    {{--
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="d">Horario actual</label>
                            <select class="form-select" aria-label="Default select example" name="" multiple>
                            @foreach ($doctors->dates as $item)
                                <option value="{{$item->dates_id}}">{{$item->day}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dates">Nuevo horario</label>
                            <select class="form-select" aria-label="Default select example" name="dates[]" multiple>
                                @foreach($date as $item)
                                <option value="{{ $item->id_date }}">{{ $item->day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>--}}
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label >Horario</label>
                                    @foreach ($dates as $date)
                                    <div>
                                        <label>
                                            {!! Form::checkbox('dates[]', $date->id_date, null, ['class'=>'mr-1']) !!}
                                            {{$date->day}}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="pull-right" href="{{route('doctores.index')}} ">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
