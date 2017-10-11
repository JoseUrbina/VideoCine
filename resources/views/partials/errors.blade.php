{{-- If exists any error --}}

@if(count($errors)>0)	
	<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <ul>

	{{-- Show all errors --}}
	@foreach($errors->all() as $message)		
		  <li>{{ $message }}</li>		
	@endforeach
	</ul>
	</div>
@endif