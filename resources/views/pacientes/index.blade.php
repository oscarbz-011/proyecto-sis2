
@include('components.nav')


<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Pacientes</h1>
    @can('pacientes.create')
	<a class="pull-right" href="{{route('pacientes.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Raza</th>
					<th>edad</th>
					<th>Familiar</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($patient as $p)
				<tr>
					<td>{{$p->name}}</td>
					<td>{{$p->race}}</td>
					<td>{{$p->age}}</td>
					<td>{{$p->relative->name}}</td>

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
                            @can('pacientes.show')
                            <div class="me-2">
                                <a href="{{route('pacientes.show', $p->id_patient)}} ">
                                    <input type="submit" class="btn btn-info" value="Ver">
                                </a>
                                </div>
                            @endcan
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

