
@include('components.nav')



<div class="container">
	<br>
	{{--@include('flash::message')--}}
	<br>
	<h1>Lista de Usuarios</h1>
	  <a class="pull-right" href="{{route('register')}} "><button type="button" class="btn btn-primary">Nuevo</button></a>

    <div class="table-responsive-sm">
		<table class="table table-border" id="tabla">
			<thead>
				<tr>
					<th>Username</th>
					<th>email</th>
                    <th>rol</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $u)
				<tr>
					<td>{{$u->username}}</td>
					<td>{{$u->email}}</td>
					<td>
                        @foreach ($u->roles as $item)
                        <span>{{$item->name}} </span>
                        @endforeach
                    </td>
					<td>
						<div class="btn-group">
							<div class="me-2">
								<a href="{{url('admin/'.$u->id_user.'/edit')}}">
									<input type="submit" class="btn btn-warning" value="Editar">
								</a>
							</div>

							<div class="me-2">
								<form method="POST" action="{{ url("admin/{$u->id_user}") }}">
								@csrf
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro')" value="Borrar">
							</form>
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

