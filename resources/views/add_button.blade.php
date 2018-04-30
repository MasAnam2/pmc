@if(config('app.button_type') == 'text')
<a onclick="tambah()" class="btn btn-danger {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.add_button') }}
</a>
@else
<a onclick="tambah()" class="btn btn-danger {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="material-icons">{{ config('app.add_button') }}</i>
</a>
@endif