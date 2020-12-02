@if (!empty($isConfirmation))
	@foreach ($data as $key => $checkbox)
		@if ($checkbox['select'])
			{{$checkbox['value']}}
		@endif
	@endforeach

	<input type="hidden" name="{{$name}}" value="{{getVariable($inputs, $name)}}">
@else
	@foreach ($data as $key => $checkbox)
		<input type="radio" class="radio-input" id="{{$name}}{{$key}}" name="{{$name}}" value="<?php if(isset($other)) echo $other?>{{$key}}"/>
		<label id="for{{$name}}{{$key}}" class="col-12"
				style=" padding-left:12px !important;
						padding-top: 5px !important;
						padding-bottom: 0px !important;
						font-family: NotoSans-JP-Regular;
						font-size: 12px !important"
				for="{{$name}}{{$key}}">{{$checkbox}}</label>
	@endforeach
@endif

@include('layouts.parts.editor.error')
