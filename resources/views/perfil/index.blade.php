@include('components.nav')


<br>
<div class="container">
    <h1>Mis datos</h1>
    @if (Auth::user()->hasRole('admin'))
        <div class="d-flex justify-content-between">
            <a href="{{url('admin/'.Auth::user()->id_user.'/edit')}}">
                <button type="button" class="btn btn-primary">Editar información</button>
            </a>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Username</label>
            <input type="text" class="form-control" name="name" id="name" value="{{auth::user()->username}}" disabled="true">
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="name" id="name" value="{{auth::user()->email}}" disabled="true">
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="name" id="name" value="{{auth::user()->password}}" disabled="true">
            <br>
        </div>

    @else
    <div>{{-- DATOS PERSONALES --}}
        <div class="flex-box">
            <div class="container">
                <div class="row">
                    @if ($relative == '')
                    <div class="d-flex justify-content-between">
                        <a href="{{route('perfil.create')}}">
                            <button type="button" class="btn btn-primary">Editar información</button>
                        </a>
                    </div>
                        <h2>hola</h2>
                    @else

                    <div class="form-group col-md-6">
                        <div class="d-flex justify-content-between">
                            <a href="{{url('perfil/'.$relative->id_relative.'/edit')}}">
                                <button type="button" class="btn btn-primary">Editar información</button>
                            </a>
                        </div>
                        <br>
                        <div>

                            <label for="users_id">Username</label>
                            <input type="text" class="form-control" name="users_id" id="users_id" value="{{$relative->user->username}}" disabled="true">
                            <br>
                            <label for="name">Email</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{auth::user()->email}}" disabled="true">
                            <br>
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$relative->name}}" disabled="true">
                            <br>
                            <label for="surname">Apellido</label>
                            <input type="text" class="form-control" name="surname" id="surname" value="{{$relative->surname}}" disabled="true">
                            <br>
                            <label for="document">Ci</label>
                            <input type="text" class="form-control" name="document" id="document" value="{{$relative->document}}" disabled="true">
                            <br>
                            <label for="address">Direccion</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$relative->address}}" disabled="true">
                            <br>
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$relative->phone}}" disabled="true">
                            <br>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="d-flex justify-content-between">
                            @if ($patients)

                            @else
                            <a href="{{route('pacientes.create')}}">
                                <button type="button" class="btn btn-primary">Agregar Mascota</button>
                            </a>
                            @endif
                        </div>
                        <br>
                        <label for="">Mascotas</label>

                        <div class="table-responsive-sm">
                            <table class="table table-border" id="tabla">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $p)
                                    <tr>
                                        <td>{{$p->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                @can('pacientes.edit')
                                                <div class="me-2">
                                                    <a href="{{url('pacientes/'.$p->id_patient.'/edit')}}">
                                                        <input type="submit" class="btn btn-warning" value="Editar">
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('pacientes.destroy')
                                                <div class="me-2">
                                                    <form method="POST" action="{{ url("pacientes/{$p->id_patient}") }}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
                                                </form>
                                                </div>
                                                @endcan

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                       </div>

                    </div>

                    @endif
                </div>

            </div>

        </div>

@endif


