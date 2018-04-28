@if(count($errors->all()) > 0)
<div class="col-md-12">
	<div class="alert alert-danger">
		GAGAL !!! <br>
		{!! join($errors->all(), '<br>') !!}
	</div>
</div>
@endif
@if(session('success'))
<div class="col-md-12">
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
</div>
@endif