@extends('layouts/front', ["type" => 1])


@section('main')
<div class="sectionbar7">
    <div class="container p-0" id="row1">
        <div class="scroll row bg-white p-3 col-sm-12" id="post_data">
                @foreach($posts as $post)
                    @include('layouts.parts.custom.article', ["type" => "article", 'contents' => $post, 'gender'=>$gender])
                @endforeach
        </div>
    </div>
</div>

<script>

  var page = 1;
	$('*').scroll(function() {
	    if($(this).scrollTop() + $(window).height() >= $(document).height()) {

	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
                console.log(data);
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            // $('.ajax-load').hide();
	            $("#post_data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}

</script>
@endsection
