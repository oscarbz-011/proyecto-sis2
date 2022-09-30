
@include('components.nav')



<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Familiares</h1>
	<a class="pull-right" href="{{route('familiares.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>ci</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Username</th>
                    <th>Mascota</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($relatives as $r)
				<tr>
					<td>{{$r->name}}</td>
					<td>{{$r->surname}}</td>
					<td>{{$r->document}}</td>
					<td>{{$r->address}}</td>
					<td>{{$r->phone}}</td>
					<td>{{$r->user->username}}</td>
                    <td>
                    @foreach ($patient as $p)
                        @if($p->relatives_id == $r->id_relative)
                        {
                            <label>{{$p->name}}</label>
                        }
                        @endif
                    @endforeach

                    </td>

					<td>
						<div class="btn-group">
							<div class="me-2">
								<a href="{{url('familiares/'.$r->id_relative.'/edit')}}">
									<input type="submit" class="btn btn-warning" value="Editar">
								</a>
							</div>

							<div class="me-2">
								<form method="POST" action="{{ url("familiares/{$r->id_relative}") }}">
								@csrf
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
							</form>
							</div>

							<div class="me-2">
							<a href="{{route('familiares.show', $r->id_relative)}} ">
								<input type="submit" class="btn btn-info" value="Ver">
							</a>
							</div>
						</div>
					</td>

            	</tr>
				@endforeach
			</tbody>
		</table>
        {{--
    	<div class="d-flex justify-content-end">
    	{{ $relatives->links() }}
    	</div>--}}
   </div>

</div>

