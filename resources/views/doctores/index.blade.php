
@include('components.nav')



<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Doctores</h1>
    @can('doctores.create')
    	<a class="pull-right" href="{{route('doctores.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Especialidad</th>
					<th>Horario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($doctor as $d)
				<tr>
					<td>{{$d->name}}</td>
					<td>{{$d->specialty}}</td>
					<td>
                        @foreach ($d->dates as $item)
                        <span>{{$item->day}} </span>
                        @endforeach
                    </td>
					<td>
						<div class="btn-group">
                            @can('doctores.edit')
                            <div class="me-2">
								<a href="{{url('doctores/'.$d->id_doctor.'/edit')}}">
									<input type="submit" class="btn btn-warning" value="Editar">
								</a>
							</div>
                            @endcan
                            @can('doctores.destroy')
                            <div class="me-2">
								<form method="POST" action="{{ url("doctores/{$d->id_doctor}") }}">
								@csrf
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
							</form>
							</div>
                            @endcan
                            @can('doctores.show')
                            <div class="me-2">
                                <a href="{{route('doctores.show', $d->id_doctor)}} ">
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

