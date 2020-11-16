	
		
@if (isset($file))
<?php 
	if (!isset($inputs)){
		$inputs[$name] = '';	
	}
	
	$checkboxs = viewConfig($file, getVariable($inputs, $name), $keyValue, false); 
?>		

	@if (!empty($isConfirmation))
		@foreach ($checkboxs as $key => $checkbox)
			@if ($checkbox['select'])
				{{$checkbox['value']}}
			@endif
		@endforeach
		
		<input type="hidden" name="{{$name}}" value="{{getVariable($inputs, $name)}}">
	@else
		@foreach ($checkboxs as $key => $checkbox)
			<input type="radio" class="radio-input" id="{{$name}}{{$key}}" name="{{$name}}" value="{{$key}}"@if ($checkbox['select']) checked="checked"@endif />
			<label class="radio-label" for="{{$name}}{{$key}}">{{$checkbox['value']}}</label>
		@endforeach
	@endif
	
	@include('layouts.parts.editor.error')

@endif
