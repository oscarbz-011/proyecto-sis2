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

    <h1>Agregar datos del doctor</h1>
    <form
        action="{{url('/doctores')}}"
        method="post"
        enctype="multipart/from-data">
        @csrf

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-md-6">
                <label for="specialty">Specialty</label>
                <input type="text" class="form-control" name="specialty" id="specialty">
            </div>
        </div>{{--
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="dates">Horario</label>
                <select multiple class="form-select" aria-label="Default select example" name="dates">
                    @foreach($dates as $item)
                    <option value="{{ $item->id_date }}">{{ $item->day }}</option>
                    @endforeach
                </select>
            </div>
        </div>--}
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="dates">Horario</label>
                <select multiple class="form-select" aria-label="Default select example" name="dates[]">
                    @foreach($dates as $item)
                    <option value="{{ $item->id_date }}"{{ (collect(old('item'))->contains($item->id_date)) ? 'selected':'' }}>{{ $item->day }}</option>
                    @endforeach
                </select>
            </div>
        </div>--}
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="dates">Horario</label>
                <select class="form-select" aria-label="Default select example" name="dates[]" multiple>
                    @foreach ($dates as $d)
                    <option value="{{ $d->id_date }}">{{ $d->day }}</option>
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


{{--
        <select class="select" multiple>
            @foreach ($lista_date as $item)
                <option checkbox value="{{ $item->id_date }}">{{ $item->day }}</option>
            @endforeach
          </select>
          <label class="form-label select-label">Example label</label>--}}
        {{--permiso de admin--
        <div class="form-group col-md-6">
            <label for="users_id">Username</label>
            <select class="form-select" aria-label="Default select example" name="users_id">
                @foreach($lista_user as $item)
                    <option value="{{ $item->id_user }}">{{ $item->username }}</option>
                @endforeach
            </select>
        </div>
        --}}
    {{-- permiso de cliente --}}


    {{--<input  type="text" class="form-control" name="users_id" value="{{ auth::user()->id_user }}"> --}}

        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a class="pull-right" href="{{route('doctores.index')}} ">
        <button type="button" class="btn btn-danger">Cancelar</button>
        </a>

    </form>

</div>
    </div>
