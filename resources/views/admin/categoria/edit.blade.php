@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Edit category</h3>
		    <hr>
			@include('partials.errors')

		    <!-- al form siempre agregar el metodo POST-->
		    <form class="form-horizontal" action="{{ route('categoria.update',['id' => $category->id ]) }}" autocomplete="off" method="POST">
		      {{ csrf_field() }}

		      <!-- Luego para realizar el PUT agregar la siguiente linea-->
		      {{ method_field('PUT') }}
		      <!-- <input name="_method" type="hidden" value="PUT">-->
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Edit</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>		
	</div>
@endsection