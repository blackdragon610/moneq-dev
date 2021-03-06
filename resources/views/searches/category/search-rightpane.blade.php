<div class="container">

    <input type="hidden" name="category" id="category" value="{{$category_name}}">
    <input type="hidden" name="keyword" id="keyword" value="{{$keyword}}">
    <input type="hidden" name="order" id="order" value="1">
    <div class="col-12 m-0 p-0">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-search-solid-small.svg" style="margin-right:10px">検索対象
        </p>
        <div class="content">
            <p><a href="{{route('search.tema', ["keyword"=>$keyword])}}" class="label-16px" style="color:#221815">
                <img src="/images/svg/image-black-arrow-left.svg" style="margin-top:-2px;"> お金の相談テーマから探す</a></p>
            <p><a href="{{route('search.category', ['keyword'=>$keyword])}}" class="label-16px" style="color:red">
                <img src="/images/svg/image-red-arrow-left.svg" style="margin-top:-2px;"> お金の悩みから探す</a></p>
            <p><a href="{{route('search.expert')}}" class="label-16px" style="color:#221815">
                <img src="/images/svg/image-black-arrow-left.svg" style="margin-top:-2px;"> 専門家から探す</a></p>
        </div>
    </div>

    <div class="col-12 m-0 p-0 mt-4">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-filter-solid-small.svg" style="margin-right:10px">絞り込み
        </p>
        <button id="filter-delete" class="btn-tag-grey-round">結果の消去<span class="fa fa-times-circle" style="font-size:14px;color:white;margin-left:5px;"></span></button>
    </div>
    <div class="col-12 m-0 p-0 mb-0">
        <input type="text" id="tema" class="form-control" style="border:0px !important;background-color: white;" readonly/>
    </div>
    <?php $i=0;?>
    @foreach($categories as $category)
        <button type="button" class="collapsible">{{$category['name']}}<span class="fa fa-angle-up"></span></button>
        <div class="content">
            <?php $i++;?>
            @include('layouts.parts.editor.radioV', ['name' => 'cat'.$i, "data" => $category['groups'] , "keyValue" => "",
                                                     'contents' => 'class="form-control"', 'other'=>'3333-'])
        </div>
    @endforeach

    <button type="button" class="collapsible">回答専門家<span class="fa fa-angle-up"></span></button>
    <div class="content">
        @include('layouts.parts.editor.radioV', ['name' => 'experts', "data" => $spec , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    @if(Cookie::has('custom_token'))
        @if(\Auth::user()->pay_status != 1)
            <a href="{{route('post.create')}}" class="btn yellow-btn-fluid" style="margin-top:24px">専門家に相談する</a>
        @else
            <a href="{{route('payment', ['sheetId'=>1, 'member'=>\Auth::user()->pay_status])}}" class="btn yellow-btn-fluid" style="margin-top:24px">専門家に相談する</a>
        @endif
    @else
        <a href="{{route('entry')}}" class="btn yellow-btn-fluid" style="margin-top:24px">専門家に相談する</a>
    @endif
</div>


<script>

    $('#filter-delete').click(function(){
        $('#tema').tagsinput('removeAll');
        $('.radio-input').prop('checked', false);
        loadMoreData(-1);
    })

    $('.radio-input').click(function(){
        var tema = $(this).val();
        var temaId = $(this).attr('id');
        var aa = $('#for' + temaId).text();
        var alias = $(this).attr('name');

        $('#tema').tagsinput({
            allowDuplicates: false,
            itemValue: 'val',  // this will be used to set id of tag
            itemText: 'label', // this will be used to set text of tag
            alias : 'alias',
            id : 'temaId'
        });

        var ss = $('#tema').tagsinput('items');

        $.each(ss, function(i, data){
            if(data.alias == alias)
                $('#tema').tagsinput('remove', data);
        });
        if(aa != '全て')
            $('#tema').tagsinput('add', { val: tema , label: aa.substring(0, 15), alias: alias, temaId: temaId});
        else
            loadMoreData(0);
    })

    $('#tema').on('itemAdded', function(event) {
        loadMoreData(0);
    });

    $('#tema').on('itemRemoved', function(event) {
        $('#' + event.item.temaId).prop('checked', false);
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
        if(order == -1){
            var formData = {
                keyword: $('#keyword').val(),
                filter: '-1',
                area: $('#prefecture_area').val(),
                category_name: $('#category').val(),
                order: order
            }
        }else{
            var formData = {
                keyword: $('#keyword').val(),
                filter: $('#tema').val(),
                area: $('#prefecture_area').val(),
                category_name: $('#category').val(),
                order: order
            }
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
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");

        var content = this.nextElementSibling;

        if (content.style.display == "block" || content.style.display == "") {
            content.style.display = "none";
            this.firstElementChild.className = "fa fa-angle-down";
        } else {
            content.style.display = "block";
            this.firstElementChild.className = "fa fa-angle-up";
        }
    });
}
</script>
