@if (!empty($isConfirmation))
	{!! nl2br(e( getVariable($inputs, $name) )) !!}
	<input type="hidden" name="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />

@else

	<textarea name="{{$name}}" {!! $contents !!} style="min-height:20em;">@if (isset($inputs)){{getVariable($inputs, $name)}}@endif</textarea>
	
	@include('layouts.parts.editor.error')
@endif
