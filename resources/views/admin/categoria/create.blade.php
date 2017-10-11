@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Add new category</h3>
		    <hr>
		    @include('partials.errors')
		    <form class="form-horizontal" action="{{ route('categoria.store') }}" method="POST" autocomplete="off">
		    	{{ csrf_field() }}
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="name" id="name">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Add</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>		
	</div>
@endsection