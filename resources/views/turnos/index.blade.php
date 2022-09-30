
@include('components.nav')


<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de turnos</h1>
    @can('turnos.create')
	    <a class="pull-right" href="{{route('turnos.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
    <div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Fecha</th>
					<th>Paciente</th>
					<th>Doctor</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($consult as $c)
				<tr>
					<td>{{$c->code}}</td>
					<td>{{$c->date}}</td>
					<td>{{$c->patient->name}}</td>
					<td>{{$c->doctor->name}}</td>
					<td>
						<div class="btn-group">
                            @can('turnos.edit')
                                <div class="me-2">
                                    <a href="{{url('turnos/'.$c->id_consult.'/edit')}}">
                                        <input type="submit" class="btn btn-warning" value="Editar">
                                    </a>
                                </div>
                            @endcan
                            @can('turnos.destroy')
                                <div class="me-2">
                                    <form method="POST" action="{{ url("turnos/{$c->id_consult}") }}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
                                    </form>
							    </div>
                            @endcan
                            @can('turnos.show')
                                <div class="me-2">
                                    <a href="{{route('turnos.show', $c->id_consult)}} ">
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

