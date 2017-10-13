@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <h3>Add new manager</h3>
		    <hr>
		    @include('partials.errors')
		    <form class="form-horizontal" action="{{ route('padmin.store') }}" method="POST" autocomplete="off">
		    	{{ csrf_field() }}
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="cedula" class="col-sm-2 control-label">Cedula</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="cedula" id="cedula" value="{{old('cedula')}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="gender" class="col-sm-2 control-label">Gender</label>
			    <div class="col-sm-6">
			      <select class="form-control" name="gender">
					  <option value="F">Femenino</option>
					  <option value="M">Masculino</option>
					</select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="phoneNumber" class="col-sm-2 control-label">Phone number</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-6">
			      <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
			    </div>
			  </div>

			  <hr>

			  <div class="form-group">
			    <label for="username" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-6">
			      <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
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