@include('components.links')
<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">SIS2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"  id="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                @can('turnos.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/turnos')}}">Turnos</a>
                    </li>
                @endcan
                @can('pacientes.index')
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pacientes')}}">Pacientes</a>
                    </li>
                    @endrole
                @endcan
                @can('familiares.index')
                    <li class="nav-item">
                        @role('admin')
                        <a class="nav-link" href="{{url('/familiares')}}">Familiares</a>
                        @endrole
                    </li>
                @endcan
                @can('doctores.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/doctores')}}">Doctores</a>
                    </li>
                @endcan
                @can('medicamentos.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/medicamentos')}}">Medicamentos</a>
                    </li>
                @endcan
                @can('recetas.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/recetas')}}">Recetas</a>
                </li>
                @endcan
                @can('derivaciones.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/derivaciones')}}">Derivaciones</a>
                    </li>
                @endcan
                @can('admin.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin')}}">Usuarios</a>
                </li>
                @endcan
                @endauth
            </ul>
            @guest
                <ul class=" navbar-nav mr-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registrarse</a>
                    </li>

                </ul>
            @endguest

            @auth
            <div>
                <a class=" nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->username}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="nav-item dropdown ">
                        <li><a class=" dropdown-item" href="{{url('/perfil')}}">Mi perfil</a></li>
                        <li><a class=" dropdown-item" href="#">Configuracion</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                            @csrf
                            <a class=" dropdown-item" href="#" onclick="this.closest('form').submit()">Cerrar sesion</a>
                            </form>
                        </li>
                    </li>
                </ul>
            </div>
            @endauth


        </div>

    </div>
</nav>

{{-- *********************************************************************************** --}}
