
@include('components.nav')



<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Medicamentos</h1>
    @can('medicamentos.create')
    	<a class="pull-right" href="{{route('medicamentos.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($medicines as $m)
				<tr>
					<td>{{$m->name}}</td>
					<td>{{$m->brand}}</td>
					<td>{{$m->price}}</td>
					<td>{{$m->stock}}</td>
					{{--<td>{{$r->curso->nombre}}</td>--}}

					<td>
						<div class="btn-group">
                            @can('medicamentos.edit')
							<div class="me-2">
								<a href="{{url('medicamentos/'.$m->id_medicine.'/edit')}}">
									<input type="submit" class="btn btn-warning" value="Editar">
								</a>
							</div>
                            @endcan
                            @can('medicamentos.destroy')
                            <div class="me-2">
								<form method="POST" action="{{ url("medicamentos/{$m->id_medicine}") }}">
								@csrf
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
							</form>
							</div>
                            @endcan
                            @can('medicamentos.show')
                            <div class="me-2">
                                <a href="{{route('medicamentos.show', $m->id_medicine)}} ">
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

