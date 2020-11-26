@if (!empty($isConfirmation))
	@if ($type == 'password')
	-
	@else
		{{getVariable($inputs, $name)}}
	@endif
	<input class="form-control" type="hidden" name="{{$name}}" id="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
@else
	<input class="form-control" type="{{$type}}" name="{{$name}}" id="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />


	@include('layouts.parts.editor.error')
@endif
