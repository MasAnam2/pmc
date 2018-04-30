@if(config('app.button_type') == 'text')
<button onclick="tampilkan()" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.see_button') }}
</button>
@else
<button onclick="tampilkan()" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="material-icons">{{ config('app.see_button') }}</i>
</button>
@endif