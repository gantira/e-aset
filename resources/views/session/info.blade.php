@if (Session::has('message'))
    <div class="alert alert-{{ $alert }} alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {{ Session::get('message') }}
	</div>
@endif