@if ($errors)
	@foreach ($errors->get($name) as $error)
		
		@if (!isset($this->isErrorScroll))
			<?php $this->isErrorScroll = true; ?>
			@section('header')
			@parent
				<script>
					$(function(){			
						$(window).scrollTop($("*[name={{$name}}]").offset().top);				
					})				
				</script>
			@endsection
		@endif
		
		<p class="error-box">{{$error}}</p>
	@endforeach
@endif