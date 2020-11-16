@if (!empty($isConfirmation))
	@if ($type == 'password')
	-
	@else
		{{getVariable($inputs, $name)}}
	@endif
	<input type="hidden" name="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
@else
	<input type="{{$type}}" name="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
	

	@include('layouts.parts.editor.error')
@endif