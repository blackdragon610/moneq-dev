<div class="container">
    
    <div class="col-12 m-0 p-0">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-search-solid-small.svg" style="margin-right:10px">検索対象
        </p>
        <div class="content">
            <?php 
                $objects = json_decode('{
                        "0": "お金の相談テーマから探す",
                        "1": "お金の悩みから探す",
                        "2": "専門家から探す"
                    }');  
            ?>
            @include('layouts.parts.editor.radioV', ['name' => 'objects', "data" => $objects , "keyValue" => "", 'contents' => 'class="form-control"'])
        </div>
    </div>

    <div class="col-12 m-0 p-0 mt-4">
        <p style="font-family: NotoSans-JP-Medium;font-size: 16px !important;">
            <img src="/images/svg/img-filter-solid-small.svg" style="margin-right:10px">絞り込み
        </p>
    </div>
    <div class="col-12 m-0 p-0 mb-4">
        <button type="button" class="btn-tag-brown">未解決<i class="fa fa-close fa-fw"></i></button>
        <button type="button" class="btn-tag-brown">女性<i class="fa fa-close fa-fw"></i></button>
        <button type="button" class="btn-tag-brown">20代<i class="fa fa-close fa-fw"></i></button>
        <button type="button" class="btn-tag-brown">既婚<i class="fa fa-close fa-fw"></i></button>
        <button type="button" class="btn-tag-brown">東京都<i class="fa fa-close fa-fw"></i></button>
        <button type="button" class="btn-tag-brown">住宅・不動産<i class="fa fa-close fa-fw"></i></button>
    </div>

    <button type="button" class="collapsible">評価</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"'])
    </div>

    <button type="button" class="collapsible">役に立った数</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"'])
    </div>

    <button type="button" class="collapsible">回答数</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"'])
    </div>

    <button type="button" class="collapsible">地域</button>
    <div class="content">
        @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="col-12" style="margin-top:6px; margin-bottom:12px;"'])
    </div>

    <button type="button" class="collapsible">回答専門家</button>
    <div class="content">
        <?php 
            $experts = json_decode('{
                    "0": "FP",
                    "1": "住宅・不動産",
                    "2": "税金・会計・家計",
                    "3": "法律",
                    "4": "年金",
                    "5": "銀行・証券",
                    "6": "保険",
                    "7": "相続",
                    "8": "経営",
                    "9": "人事・労務・環境",
                    "10": "社会・福祉・教育",
                    "11": "医療"
                }');  
        ?>
        @include('layouts.parts.editor.radioV', ['name' => 'experts', "data" => $experts , "keyValue" => "", 'contents' => 'class="form-control"'])
    </div>

    <button class="yellow-btn-fluid">専門家に相談する</button>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}   
</script>