@if(config('app.button_type') == 'text')
<a target="_blank" href="{{ $link }}" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.print_button') }}
</a>
@else
<a target="_blank" href="{{ $link }}" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="material-icons">{{ config('app.print_button') }}</i>
</a>
@endif