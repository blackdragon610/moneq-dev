<div class="container">

    <input type="hidden" name="keyword" id="keyword" value="{{$keyword}}">
    <input type="hidden" name="order" id="order" value="1">
    <div class="col-12 m-0 p-0">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-search-solid-small.svg" style="margin-right:10px">検索対象
        </p>
        <div class="content">
            <p><a href="{{route('search.tema', ["keyword"=>$keyword])}}" class="label-16px" style="color: red">
                <img src="/images/svg/image-red-arrow-left.svg" style="margin-top:-2px;"> お金の相談テーマから探す</a></p>
            <p><a href="{{route('search.category', ['keyword'=>$keyword])}}" class="label-16px" style="color: #221815">
                <img src="/images/svg/image-black-arrow-left.svg" style="margin-top:-2px;"> お金の悩みから探す</a></p>
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
        <input type="text" id="tema" class="form-control" style="border:0px !important"/>
    </div>

    <button type="button" class="collapsible">相談状況<span class="fa fa-angle-up"></span></button>
    <div class="content">
        <?php
            $consultStatus = json_decode('{
                    "1-0": "全て",
                    "1-1": "解決済み",
                    "1-2": "未解決",
                    "1-3": "回答なし"
                }');
        ?>
        @include('layouts.parts.editor.radioV', ['name' => 'consultStatus', "data" => $consultStatus , "keyValue" => "",
                 'contents' => 'class="form-control"'])
    </div>

    <button type="button" class="collapsible">性別<span class="fa fa-angle-up"></span></button>
    <div class="content">
        <?php
            $gender = json_decode('{
                    "2-0": "全て",
                    "2-2": "女性",
                    "2-1": "男性",
                    "2-3": "その他"
                }');
        ?>
        @include('layouts.parts.editor.radioV', ['name' => 'gender', "data" => $gender , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    <button type="button" class="collapsible">年代<span class="fa fa-angle-up"></span></button>
    <div class="content">
        <?php
            $ages = json_decode('{
                    "3-0": "全て",
                    "3-1": "乳幼児",
                    "3-2": "10歳未満",
                    "3-3": "10代",
                    "3-4": "20代",
                    "3-5": "30代",
                    "3-6": "40代",
                    "3-7": "50代",
                    "3-8": "60代",
                    "3-9": "70代以上"
                }');
        ?>
        @include('layouts.parts.editor.radioV', ['name' => 'ages', "data" => $ages , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    <button type="button" class="collapsible">家族構成<span class="fa fa-angle-up"></span></button>
    <div class="content">
        <?php
            $family = json_decode('{
                    "4-0": "全て",
                    "4-1": "既婚",
                    "4-2": "未婚",
                    "4-3": "子供あり",
                    "4-4": "子供なし"
                }');
        ?>
        @include('layouts.parts.editor.radioV', ['name' => 'family', "data" => $family , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    <button type="button" class="collapsible">地域<span class="fa fa-angle-up"></span></button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "",
                 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"', 'other'=>'6-'])
    </div>

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
        loadMoreData(-1);
        $('.radio-input').prop('checked', false);

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

    $('#prefecture_area').change(function(){
        var tema = $(this).val();
        var aa = $("#prefecture_area option:selected").text();
        var alias = $(this).attr('name');

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
    });

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
        var formData = {
            keyword: $('#keyword').val(),
            filter: $('#tema').val(),
            area: $('#prefecture_area').val(),
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
