@if(config('app.button_type') == 'text')
<button type="submit" class="btn btn-primary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.save_button') }}
</button>
@else
<button type="submit" class="btn btn-primary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="material-icons">{{ config('app.save_button') }}</i>
</button>
@endif