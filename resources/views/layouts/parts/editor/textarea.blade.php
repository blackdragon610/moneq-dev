@if (!empty($isConfirmation))
    <div class="panel-body">
        {!! nl2br(e( getVariable($inputs, $name) )) !!}
        <input type="hidden" name="{{$name}}" {!! $contents !!} value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
    </div>

@else

	<textarea class="form-control" name="{{$name}}" id="{{$name}}" {!! $contents !!} style="min-height:20em !important;">@if (isset($inputs)){{getVariable($inputs, $name)}}@endif</textarea>

	@include('layouts.parts.editor.error')
@endif
