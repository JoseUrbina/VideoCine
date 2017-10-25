@extends('layouts.app')

@section('content')

<div class="panel panel-primary" style="margin:20px;">
  <div class="panel-heading">
    <h3 class="panel-title">List of loans</h3>
  </div>
  <div class="panel-body">
  	<!-- Add message file -->
  	@include('partials.message')
  	<a href="{{ url('admin/prestamo/create') }}" class="btn btn-primary">Register</a>
  	<hr>
    <div class="table-responsive" style="padding-right:5px;">
	  <table class="table table-bordered table-condensed table-striped" id="myTable">
	  		<thead>
	  			<th>ID</th>
	  			<th>Client</th>
	  			<th>Loan Date</th>
	  			<th>Return Date</th>
	  			<th>N° Movies</th>
	  			<th>Status</th>
	  			<th>Action</th>
	  		</thead>
	  		<tbody>
	  			@foreach($prestamo as $p)
					<tr>
						<td>{{ $p->id }}</td>
						<td>{{ $p->cliente->name . ' ' . $p->cliente->lastname}}</td>
						<td>{{ $p->fechaPrestamo }}</td>
						<td>{{ $p->fechaRegreso }}</td>
						<!-- Showing amount movies of this loan -->
						<td>{{ count($p->peliculas) }}</td>					
						<td><input type="checkbox" checked="{{ $p->status }}" disabled="true"></td>
						<td>							
							{{-- Button and id_modal have the idCliente
								 for identify which row belongs to
								--}}
								
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$p->id}}">Delete</button>

							@component('partials.eliminar', 
									['title' => 'Eliminar registro',
									 'id' => $p->id,
									'route' => route('prestamo.destroy', ['id' => $p->id ])])
							    <strong>¿Desea eliminar el registro?</strong>
					   		@endcomponent						
						</td>						
					</tr>
				@endforeach
	  		</tbody>
		</table>	
	</div>
  </div>
</div>	
@endsection

@push('scripts')
    <script>
    	$(function()
    	{
    		$('th, td').addClass('text-center');
    	});
    </script>
@endpush