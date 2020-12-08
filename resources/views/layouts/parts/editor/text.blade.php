@if (!empty($isConfirmation))
	@if ($type == 'password')
	-
    @else
    <div class="panel-body">
        {{getVariable($inputs, $name)}}
    </div>
	@endif
	<input type="hidden" name="{{$name}}" id="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
@else
	<input  type="{{$type}}" name="{{$name}}" id="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />


	@include('layouts.parts.editor.error')
@endif
