<?php
	if (!isset($inputs)){
		$inputs[$name] = '';
    }


    $selects = viewConfig($file, getVariable($inputs, $name), $keyValue, false);
    // if($name=='child')   dd($selects);
?>


@if (!empty($isConfirmation))
    @if (isset(current($selects)["value"]["groups"]))
        @foreach ($selects as $select)
            @foreach ($select as $key => $value)

                @if (isset($value["groups"]))
                    @foreach ($value["groups"] as $key2 => $value)
                        @if (getVariable($inputs, $name) == $key2)
                            {{$value}}
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endforeach
    @else
        @if (isset($selects[getVariable($inputs, $name)]))

            {{$selects[getVariable($inputs, $name)]['value']}}
        @else
            @if (isset($first))
                {!! $first !!}
            @endif
        @endif
    @endif

	<input type="hidden" name="{{$name}}" id="{{$name}}" value="{{getVariable($inputs, $name)}}">
@else

	<select class="form-control" name="{{$name}}" id="{{$name}}" style="border:1px solid #dbdbdb" {!! $contents !!} >
		@if (isset($first))
			<option value="0">{!! $first !!}</option>
		@endif
			@if ($selects)
				@foreach ($selects as $key => $select)
                    @if (isset($select['value']["groups"]))
                        <optgroup label="{{$select['value']["name"]}}">
                            @foreach ($select['value']["groups"] as $key2 => $group)
                                <option value="<?php if(isset($other)) echo $other?>{{$key2}}"@if (getVariable($inputs, $name) == $key2) selected @endif>{{$group}}</option>
                            @endforeach
                        </optgroup>
                    @else
    					<option value="<?php if(isset($other)) echo $other?>{{$key}}"@if ($select['select']) selected @endif>{{$select['value']}}</option>
                    @endif
				@endforeach
			@endif
	</select>

	@include('layouts.parts.editor.error')
@endif
