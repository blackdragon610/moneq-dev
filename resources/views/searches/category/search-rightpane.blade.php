<div class="container">

    <input type="hidden" name="category" id="category" value="{{$category_name}}">
    <input type="hidden" name="keyword" id="keyword" value="{{$keyword}}">
    <input type="hidden" name="order" id="order" value="1">

    <div class="col-12 m-0 p-0">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-search-solid-small.svg" style="margin-right:10px">検索対象
        </p>
        <div class="content">
            <p><a href="{{route('search.tema', ["keyword"=>$keyword])}}" style="color: rgb(0, 0, 0); font-weight:600">お金の相談テーマから探す</a></p>
            <p><a href="{{route('search.category', ['keyword'=>$keyword])}}" style="color: red; font-weight:600">お金の悩みから探す</a></p>
            <p><a href="{{route('search.expert')}}" style="color: rgb(0, 0, 0); font-weight:600">専門家から探す</a></p>
        </div>
    </div>

    <div class="col-12 m-0 p-0 mt-4">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-filter-solid-small.svg" style="margin-right:10px">絞り込み
        </p>
    </div>
    <div class="col-12 m-0 p-0 mb-4">
        <input type="text" id="tema" class="form-control"/>
    </div>
    <?php $i=0;?>
    @foreach($categories as $category)
        <button type="button" class="collapsible">{{$category['name']}}</button>
        <div class="content">
            <?php $i++;?>
            @include('layouts.parts.editor.radioV', ['name' => 'cat'.$i, "data" => $category['groups'] , "keyValue" => "",
                                                     'contents' => 'class="form-control"', 'other'=>'3333-'])
        </div>
    @endforeach

    <button type="button" class="collapsible">回答専門家</button>
    <div class="content">
        @include('layouts.parts.editor.radioV', ['name' => 'experts', "data" => $spec , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    @if(Cookie::has('custom_token'))
        @if(\Auth::user()->pay_status != 1)
            <a href="{{route('post.create')}}" class="btn yellow-btn-fluid">専門家に相談する</a>
        @else
            <a href="{{route('payment', ['sheetId'=>1, 'member'=>\Auth::user()->pay_status])}}" class="btn yellow-btn-fluid">専門家に相談する</a>
        @endif
    @else
        <a href="{{route('entry')}}" class="btn yellow-btn-fluid" >専門家に相談する</a>
    @endif
</div>


<script>
    $('.radio-input').click(function(){
        var tema = $(this).val();
        var temaId = $(this).attr('id');
        var aa = $('#for' + temaId).text();
        var alias = $(this).attr('name');
        console.log(tema);

        $('#tema').tagsinput({
        allowDuplicates: false,
            itemValue: 'val',  // this will be used to set id of tag
            itemText: 'label', // this will be used to set text of tag
            alias : 'alias'
        });

        var ss = $('#tema').tagsinput('items');

        $.each(ss, function(i, data){
            if(data.alias == alias)
                $('#tema').tagsinput('remove', data);
        });
        if(aa != '全て')
            $('#tema').tagsinput('add', { val: tema , label: aa, alias: alias});
        else
            loadMoreData(0);
    })

    $('#tema').on('itemAdded', function(event) {
        loadMoreData(0);
    });

    $(document).on('click','span[data-role]',function(){
        loadMoreData(0);
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        $('#success-div').attr("style", 'display:none');
        $('#error-div').attr("style", 'display:none');

        $('.pagination li').removeClass('active');
        $(this).parent('li').addClass('active');
        var url = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        loadPageData(page);
    });


	function loadMoreData(order){
        var formData = {
            keyword: $('#keyword').val(),
            filter: $('#tema').val(),
            area: $('#prefecture_area').val(),
            category_name: $('#category').val(),
            order: order
        }
	  $.ajax(
	        {
	            url: '',
	            type: "get",
                data: formData,
	        })
	        .done(function(data)
	        {
	            $("#main").empty().html(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}

	function loadPageData(page){
        var order = $('#order').val();
        var formData = {
            keyword: $('#keyword').val(),
            filter: $('#tema').val(),
            area: $('#prefecture_area').val(),
            category_name: $('#category').val(),
            order: order,
            page: page
        }
	  $.ajax(
	        {
	            url: '',
	            type: "get",
                data: formData,
	        })
	        .done(function(data)
	        {
	            $("#main").empty().html(data.html);
                location.hash = page;
                $("html, body").animate({ scrollTop: 0 }, 0);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
