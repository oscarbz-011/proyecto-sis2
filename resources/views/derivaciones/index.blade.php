
@include('components.nav')



<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Derivaciones</h1>
    @can('derivaciones.create')
	    <a class="pull-right" href="{{route('derivaciones.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Descripcion</th>
					<th>Hospital</th>
					<th>Paciente</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($transfers as $t)
				<tr>
					<td>{{$t->description}}</td>
					<td>{{$t->hospital}}</td>
					<td>{{$t->patient->name}}</td>
					<td>{{$t->date}}</td>
					{{--<td>{{$r->curso->nombre}}</td>--}}

					<td>
						<div class="btn-group">
                            @can('derivaciones.edit')
                            <div class="me-2">
								<a href="{{url('derivaciones/'.$t->id_transfer.'/edit')}}">
									<input type="submit" class="btn btn-warning" value="Editar">
								</a>
							</div>
                            @endcan
                            @can('derivaciones.destroy')
                            <div class="me-2">
								<form method="POST" action="{{ url("derivaciones/{$t->id_transfer}") }}">
								@csrf
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
							</form>
							</div>
                            @endcan
                            @can('derivaciones.show')
                            <div class="me-2">
                                <a href="{{route('derivaciones.show', $t->id_transfer)}} ">
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

