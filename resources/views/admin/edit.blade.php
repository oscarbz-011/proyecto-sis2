@include('components.nav')
<div class="container">
    <div class="jumbotron">
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
                {{--
                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif--}}
                <h1>Asignar un rol</h1>
                            <p class="h5">Username</p>
                            <p class="form-control">{{$users->username}}</p>
                        </div>
                    </div>
                    <h2 class="h5">Listado de roles</h2>
                    {!! Form::model($users, ['route'=>['admin.update',$users],'method'=>'put']) !!}
                        @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                        @endforeach
                        <br>
                        <br>
                        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                        <a class="pull-right" href="{{route('admin.index')}} ">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                        </a>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
