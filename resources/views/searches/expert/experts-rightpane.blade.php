<div class="container">

    <input type="hidden" name="order" id="order" value="1">

    <div class="col-12 m-0 p-0">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-search-solid-small.svg" style="margin-right:10px">検索対象
        </p>
        <div class="content">
            <p><a href="{{route('search.tema')}}" style="color:rgb(0, 0, 0); font-weight:600">お金の相談テーマから探す</a></p>
            <p><a href="{{route('search.category')}}" style="color:rgb(0, 0, 0); font-weight:600">お金の悩みから探す</a></p>
            <p><a href="{{route('search.expert')}}" style="color:red; font-weight:600">専門家から探す</a></p>
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

    <button type="button" class="collapsible">評価</button>
    <div class="content">
        <?php
            $evaluation = json_decode('{
                    "0": "全て",
                    "1": "1.0以上",
                    "2": "2.0以上",
                    "3": "3.0以上",
                    "4": "4.0以上"
                }');
        ?>
    @include('layouts.parts.editor.select', ['name' => 'evaluation', "file" => $evaluation, "keyValue" => "",
                'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"', 'other'=>'5-'])
    </div>

    <button type="button" class="collapsible">役に立った数</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'help', "file" => configJson("custom/numbers"), "keyValue" => "",
                'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"', 'other'=>'1-'])
    </div>

    <button type="button" class="collapsible">回答数</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'answers', "file" => configJson("custom/numbers"), "keyValue" => "",
                 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"', 'other'=>'2-'])
    </div>

    <button type="button" class="collapsible">地域</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "",
                 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"', 'other'=>'3-'])
    </div>

    <button type="button" class="collapsible">回答専門家</button>
    <div class="content">
        @include('layouts.parts.editor.radioV', ['name' => 'experts', "data" => $spec , "keyValue" => "",
                 'contents' => 'class="form-control"', 'other'=>'4-'])
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

    {{-- <button class="yellow-btn-fluid">専門家に相談する</button> --}}
</div>


<script>

    $('#evaluation').change(function(){
        var tema = $(this).val();
        var aa = $("#evaluation option:selected").text();
        $('#tema').tagsinput({
            allowDuplicates: false,
                itemValue: 'val',  // this will be used to set id of tag
                itemText: 'label' // this will be used to set text of tag
            });

        $('#tema').tagsinput('add', { val: tema , label: aa});

    });

    $('#help').change(function(){
        var tema = $(this).val();
        var aa = $("#help option:selected").text();
        $('#tema').tagsinput({
            allowDuplicates: false,
                itemValue: 'val',  // this will be used to set id of tag
                itemText: 'label' // this will be used to set text of tag
            });

        $('#tema').tagsinput('add', { val: tema , label: aa});

    });

    $('#answers').change(function(){
        var tema = $(this).val();
        var aa = $("#answers option:selected").text();
        $('#tema').tagsinput({
            allowDuplicates: false,
                itemValue: 'val',  // this will be used to set id of tag
                itemText: 'label' // this will be used to set text of tag
            });

        $('#tema').tagsinput('add', { val: tema , label: aa});

    });

    $('#prefecture_area').change(function(){
        var tema = $(this).val();
        var aa = $("#prefecture_area option:selected").text();
        $('#tema').tagsinput({
            allowDuplicates: false,
                itemValue: 'val',  // this will be used to set id of tag
                itemText: 'label' // this will be used to set text of tag
            });

        $('#tema').tagsinput('add', { val: tema , label: aa});
    });

    $('.radio-input').click(function(){
            var tema = $(this).val();
            var temaId = $(this).attr('id');
            var aa = $('#for' + temaId).text();

            $('#tema').tagsinput({
            allowDuplicates: false,
                itemValue: 'val',  // this will be used to set id of tag
                itemText: 'label' // this will be used to set text of tag
            });

            $('#tema').tagsinput('add', { val: tema , label: aa});
        })

        $('#tema').on('itemAdded', function(event) {
            loadMoreData(0);
        });

        $('#tema').on('itemRemoved', function(event) {
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
                filter: $('#tema').val(),
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
                filter: $('#tema').val(),
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
