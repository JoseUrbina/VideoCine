@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Add new movie</h3>
		    <hr>
		    @include('partials.errors')
		    <form class="form-horizontal" action="{{ route('pelicula.update',['id' => $pelicula->id]) }}" method="POST" autocomplete="off" 
		    		enctype="multipart/form-data">
		    	{{ csrf_field() }}
		    	{{ method_field('PUT') }}
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="name" id="name" value="{{old('name',$pelicula->name)}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="description" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="description" id="description"
			      		 value="{{ old('description', $pelicula->description) }}">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="categoria_id" class="col-sm-2 control-label">Category</label>
			    <div class="col-sm-6">
			      <select class="form-control" name="categoria_id">
			      	  @foreach($category as $c)
						  <option value="{{ $c->id }}" {{ $c->id == old('categoria_id',$pelicula->categoria_id) ? 'selected="selected"' : ''}}>
						  	{{ $c->name }}
						  </option>
			      	  @endforeach
					</select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="fechaLanz" class="col-sm-2 control-label">Date</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="fechaLanz" id="fechaLanz" value="{{old('fechaLanz',$pelicula->fechaLanz)}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="image" class="col-sm-2 control-label">Image</label>
			    <div class="col-sm-6">
			      <input type="file" class="form-control" name="image" id="image">
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