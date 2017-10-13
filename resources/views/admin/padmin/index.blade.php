@extends('layouts.app')

@section('content')

<div class="panel panel-primary" style="margin:20px;">
  <div class="panel-heading">
    <h3 class="panel-title">List of managers</h3>
  </div>
  <div class="panel-body">
  	<!-- Add message file -->
  	@include('partials.message')
  	<a href="{{ url('admin/padmin/create') }}" class="btn btn-primary">Register</a>
  	<hr>
    <div class="table-responsive" style="padding-right:5px;">
	  <table class="table table-bordered table-condensed table-striped" id="myTable">
	  		<thead>
	  			<th>ID</th>
	  			<th>Name</th>
	  			<th>LastName</th>
	  			<th>Cedula</th>
	  			<th>Address</th>
	  			<th>Gender</th>
	  			<th>Status</th>
	  			<th>Action</th>
	  		</thead>
	  		<tbody>
	  			@foreach($admin as $a)
					<tr>
						<td>{{ $a->id }}</td>
						<td>{{ $a->name }}</td>
						<td>{{ $a->lastname }}</td>
						<td>{{ $a->cedula }}</td>
						<td>{{ $a->address }}</td>
						@if($a->gender === 'M')
							<td>Masculino</td>
						@else
							<td>Femenino</td>
						@endif						
						<td><input type="checkbox" checked="{{ $a->status }}" disabled="true"></td>
						<td>
							<a href="{{ route('padmin.edit',['id' => $a->id ]) }}" class="btn btn-default">Edit</a>
							
							{{-- Button and id_modal have the idCategory 
								 for identify which row belongs to
								--}}
								
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$a->id}}">Delete</button>

							@component('partials.eliminar', 
									['title' => 'Eliminar registro',
									 'id' => $a->id,
									'route' => route('padmin.destroy', ['id' => $a->id ])])
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