<script type="text/javascript" src="{!! url('/js/pickadate/lib/picker.js') !!}"></script>
<script type="text/javascript" src="{!! url('/js/pickadate/lib/picker.date.js') !!}"></script>
<script type="text/javascript" src="{!! url('/js/pickadate/lib/lang-ja.js') !!}"></script>
<link rel="stylesheet" href="{!! url('/js/pickadate/lib/themes/default.css') !!}">
<link rel="stylesheet" href="{!! url('/js/pickadate/lib/themes/default.date.css') !!}">

<script>
$(function(){
	$('.date').pickadate();		
});
</script>

@if (!empty($isConfirmation))
	{{getVariable($inputs, $name)}}
	<input type="hidden" name="{{$name}}" value="{{getVariable($inputs, $name)}}">		
@else
	<input type="text" class="date @if (isset($class)){{$class}}@endif" name="{{$name}}" <?php echo $contents; ?> value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
	
	@include('layouts.parts.editor.error')
@endif