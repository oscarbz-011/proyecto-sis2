
@include('components.nav')

<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de recetas</h1>
    @can('recetas.create')
	<a class="pull-right" href="{{route('recetas.create')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>
    @endcan
	<div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
                    <th>Detalles</th>
					<th>Paciente</th>
					<th>Medicamento</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($prescriptions as $pr)
				<tr>
                    <td>{{$pr->details}}</td>
					<td>{{$pr->patient->name}}</td>
					<td>{{$pr->medicine->name}}</td>
					<td>
						<div class="btn-group">

                            @can('recetas.edit')
                                <div class="me-2">
                                    <a href="{{url('recetas/'.$pr->id_prescription.'/edit')}}">
                                        <input type="submit" class="btn btn-warning" value="Editar">
                                    </a>
                                </div>
                            @endcan
                            @can('recetas.destroy')
                                <div class="me-2">
                                    <form method="POST" action="{{ url("recetas/{$pr->id_prescription}") }}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
                                </form>
                                </div>
                            @endcan
                            @can('recetas.show')
                            <div class="me-2">
                                <a href="{{route('recetas.show', $pr->id_prescription)}} ">
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

