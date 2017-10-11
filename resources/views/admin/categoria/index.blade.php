@extends('layouts.app')

@section('content')

<div class="panel panel-primary" style="margin:20px;">
  <div class="panel-heading">
    <h3 class="panel-title">List of categories</h3>
  </div>
  <div class="panel-body">
  	<!-- Add message file -->
  	@include('partials.message')
  	<a href="{{ url('admin/categoria/create') }}" class="btn btn-primary">Register</a>
  	<hr>
    <div class="table-responsive" style="padding-right:5px;">
	  <table class="table table-bordered table-condensed table-striped" id="myTable">
	  		<thead>
	  			<th>ID</th>
	  			<th>Name</th>
	  			<th>Status</th>
	  			<th >Action</th>
	  		</thead>
	  		<tbody class="text-center">
	  			@foreach($category as $cat)
					<tr>
						<td>{{ $cat->id }}</td>
						<td>{{ $cat->name }}</td>
						<td><input type="checkbox" checked="{{ $cat->status }}" disabled="true"></td>
						<td>
							<a href="{{ route('categoria.edit',['id' => $cat->id ]) }}" class="btn btn-default">Edit</a>
							
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
						</td>
					</tr>
				@endforeach
	  		</tbody>
		</table>	
	</div>
  </div>
</div>	

@component('partials.eliminar', 
		  ['title' => 'Eliminar registro', 
		   'route' => route('categoria.destroy', ['id' => $cat->id ])])
    <strong>¿Desea eliminar el registro?</strong>
@endcomponent

@endsection

@push('scripts')
    <script>
    	$(function()
    	{
    		$('th').addClass('text-center');
    	});
    </script>
@endpush