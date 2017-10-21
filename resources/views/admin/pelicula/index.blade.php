@extends('layouts.app')

@section('content')

<div class="panel panel-primary" style="margin:20px;">
  <div class="panel-heading">
    <h3 class="panel-title">List of managers</h3>
  </div>
  <div class="panel-body">
  	<!-- Add message file -->
  	@include('partials.message')
  	<a href="{{ url('admin/pelicula/create') }}" class="btn btn-primary">Register</a>
  	<hr>
    
	<div class="row">
	  @foreach($peliculas as $p)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="/imagenes/{{ $p->image }}" class="img-responsive img-rounded" style="width: 100%;height: 200px;">
	      <div class="caption">
	        <h3>{{ $p->name }}</h3>
	        <p>States: {{($p->status == 'D') ? 'Disponible':'Rentada' }}</p>
	        <a href="{{ route('pelicula.edit', ['id' => $p->id]) }}" class="btn btn-info">Editar</a> | <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$p->id}}">Delete</button>

							@component('partials.eliminar', 
									['title' => 'Eliminar registro',
									 'id' => $p->id,
									'route' => route('pelicula.destroy', ['id' => $p->id ])])
							    <strong>¿Desea eliminar el registro?</strong>
					   		@endcomponent
	      </div>
	    </div>
	  </div>
	  @endforeach
	</div>

	<div class="text-center">
		<!-- Muestra la paginacion: variable pasada a la vista -> funcion render-->
		{{ $peliculas->render() }}
	</div>	
  </div>
</div>	
@endsection