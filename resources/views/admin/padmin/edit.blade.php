@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Edit manager</h3>
		    <hr>
			@include('partials.errors')

		    <!-- al form siempre agregar el metodo POST-->
		    <form class="form-horizontal" action="{{ route('padmin.update',['id' => $admin->id ]) }}" autocomplete="off" method="POST">
		      {{ csrf_field() }}

		      <!-- Luego para realizar el PUT agregar la siguiente linea-->
		      {{ method_field('PUT') }}
		      <!-- <input name="_method" type="hidden" value="PUT">-->

			 @php
    			$gender = ['F' => 'Femenino', 'M' => 'Masculino'];
			 @endphp

			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="name" id="name" 
			      value="{{ old('name',$admin->name)}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="lastname" id="lastname" 
			      value="{{ old('lastname', $admin->lastname) }}">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="cedula" class="col-sm-2 control-label">Cedula</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="cedula" id="cedula"
			      value="{{old('cedula', $admin->cedula)}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="gender" class="col-sm-2 control-label">Gender</label>
			    <div class="col-sm-6">
			      <select class="form-control" name="gender">
			      	<!-- Fill the select per separate because i need to simulate the selection of one -->
			      		@foreach($gender as $i => $g)
			      			<!-- 
			      				Create each option and add the select with unitary if
			      			 -->
							<option value="{{ $i }}" 
							{{ $i == old('gender',$admin->gender) ? 'selected="selected"' : ''}}>
								{{ $g }}</option>
			      		@endforeach
					</select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="phoneNumber" class="col-sm-2 control-label">Phone number</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" 
			      value="{{ old('phoneNumber',$admin->phoneNumber) }}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="address" id="address"
			      value="{{ old('address', $admin->address) }}">
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