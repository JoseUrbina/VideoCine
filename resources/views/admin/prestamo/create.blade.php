@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Add new prestamo</h3>
		    <hr>
		    @include('partials.errors')
		    <form class="form-horizontal" action="{{ route('prestamo.store') }}" method="POST" autocomplete="off">
		    	{{ csrf_field() }}
		      <div class="form-group">
			    <label for="cliente_id" class="col-sm-2 control-label">Client</label>
			    <div class="col-sm-6">
			      <select class="form-control" name="cliente_id">
			      	  @foreach($cliente as $c)
						  <option value="{{ $c->id }}">{{ $c->name . ' ' . $c->lastname}}</option>
			      	  @endforeach
					</select>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="fechaPrestamo" class="col-sm-2 control-label">Loan Date</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="fechaPrestamo" id="fechaPrestamo" value="{{old('fechaPrestamo')}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="fechaRegreso" class="col-sm-2 control-label">Return Date</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="fechaRegreso" id="fechaRegreso" value="{{old('fechaRegreso')}}">
			    </div>
			  </div>

			  <hr>

			  <div class="form-group">
			    <label for="pelicula" class="col-sm-2 control-label">Pelicula</label>
			    <div class="col-sm-6">
			      <select class="form-control" name="pelicula" id="pel">
			      	  @foreach($peliculas as $p)
						  <option value="{{ $p->id }}">{{ $p->name }}</option>
			      	  @endforeach
					</select>
			    </div>
			    <div class="col-sm-2">
					<div class="form-group form-group-sm">
						<button type="button" class="btn btn-primary" id="btn_add">Add</button>
					</div>						
				</div>
			  </div>
			  
			  <div class="col-md-12">
					<div class="table-responsive">
						<table id="pelicula" class="table  table-condensed table-striped table-bordered table-hover">
						<thead class="bg-blue" id="table">
							<th class="text-center">Opciones</th>
							<th class="text-center">ID</th>
							<th class="text-center">Pelicula</th>
						</thead>
						<tbody>
									
						</tbody>
						</table>
					</div>
				</div>

				<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">save</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>		
	</div>
@endsection

@push('scripts')
	<script>
		$(function()
		{
			// Funcion que se ejecuta cuando de el agregar
			$('#btn_add').click(function(){
				Add();
			});

			function Add()
			{
				// Si no se agrega var la variable queda como global
				var idPelicula = $('#pel option:selected').val();
				var nombre = $('#pel option:selected').text();
				
				var row = '<tr class="selected text-center"><td><button type="button" class="btn btn-danger" id="eliminar">Eliminar</button></td><td><input type="hidden" name="pelicula_id[]" value="'+idPelicula+'"><p class="form-control-static">'+idPelicula+'</p></td><td><p class="form-control-static">'+nombre+'</p></td></tr>';
					
				$('#pelicula').children('tbody').append(row);

			}		
			});

			// Sirve porque el elemento se crea despues de la ejecucion del DOM
			$(document).on('click', '#eliminar', function (event) {
			    event.preventDefault();
			    // this hace referencia al elemento que hace el clic
			    $(this).closest('tr').remove();
			});

			$('form').on('submit',function(e)
			{
				$filas = $('#pelicula tr').length;

				if($filas = 0)
				{
					e.preventDefault();
					alert('No ha seleccionado ninguna pelicula');
				}
			}
		});
	</script>

@endpush