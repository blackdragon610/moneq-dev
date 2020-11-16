@if (!empty($isConfirmation))
	{{$inputs[$name]}}

	@if (($type == 'image') && (!empty($inputs[$name])))
	<p><img src="/api/image/?&dir={{$uploadType}}&image={{getVariable($inputs, $name)}}&size=Thum&cid={{$name}}" /></p>
	@endif
	
	<input type="hidden" name="{{$name}}" value="{{getVariable($inputs, $name)}}">	
	<input type="hidden" name="fileType[{{$name}}]" value="{{$uploadType}}" />
	
@else
<div class="input-group">
    <label class="input-group-btn">
        <span class="btn btn-primary">
            ファイルを選択<input type="file" name="{{$name}}" value="" {!! $contents !!} style="display:none;"/>
        </span>
    </label>
     <input type="text" class="form-control" readonly="">
	
		 <script>
				$(document).on('change', ':file', function() {
				    var input = $(this),
				    numFiles = input.get(0).files ? input.get(0).files.length : 1,
				    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				    input.parent().parent().next(':text').val(label);
				});
			</script>
</div>

	<input type="hidden" name="{{$name}}" value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />
	<input type="hidden" name="fileType[{{$name}}]" value="{{$uploadType}}" />

	@if ((isset($inputs))  && (empty($inputs[$name])))
		<p>{{getVariable($inputs, $name)}}</p>
	@endif
	
	@if (($type == 'image') && (!empty($inputs[$name])))	
		<p><img src="/api/image/?&dir={{$uploadType}}&image=@if (isset($inputs)){{getVariable($inputs, $name)}}@endif&size=Thum&cid={{$name}}&sid={{ csrf_token() }}_files" /></p>
		<p><label><input type="checkbox" name="file_dels[{{$name}}]" value="@if (isset($inputs)){{getVariable($inputs, $name)}}@endif" />削除する</label></p>
	@endif
	
	@include('layouts.parts.editor.error')
@endif
