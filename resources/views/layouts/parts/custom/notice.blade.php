<article class="col-12 m-0 p-0" style="margin-bottom:-1px !important">
    <div class="row m-0 p-0 notice">
        <span id="noticedate">{{$item->created_at}}</span>
        <div class="col p-0" style="margin-top:20px; margin-bottom:20px">
            <div class="grey-round-tag mright" class="text-center">お知らせ</div>
            <div class="yellow-round-tag" class="text-center">NEWS</div>
            <div class="w-100"></div>
            <p id="description" class="keepTwoLine mb-0">{{$contents->body}}</p>
        </div>
    </div>
</article>
