<!-- If session has the status variable  -->

@if(session()->has('status'))

	<!-- status: it's a array with color and message -->
	<div class="alert alert-{{ session('status')['color'] }}" role="alert">
		<strong>
			{{ session('status')['message'] }}
		</strong>		
	</div>

@endif
