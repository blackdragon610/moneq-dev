@extends('layouts/front', ["type" => 1])

@section('main')

<div class="whitepanel">
    <div class="container">

            <?php 
                $postId = 1; 
            ?>

        <p class="title-medium" style="padding-left:70px">新型コロナウイルスに関する無料提供について</p>
        <div class="row">
            <div class="col-12 bg-white">

                <div class="row">
                    <p class="label-16px col-10" style="padding-left:70px;padding-right:70px;padding-top:56px;line-height:1.7">
                        アジア地域を中心とした新型コロナウイルスの流行が深刻化する中で、各人がより正しい知識をもち、予防・対策をすることが求められています。このような状況を踏まえ、アスクドクターズでは皆様のお役に立てるよう、機能を無料で提供しています。
                        <br/><br/>
                        サービス内容について<br/>
                        新型コロナウイルスに関する相談事例を公開新型コロナウイルスに関する医師相談を提供<br/>
                        新型コロナウイルスに関する相談事例の閲覧相談内容と医師回答が無料で閲覧できます。<br/>
                        新型コロナウイルスに関する相談事例（無料）<br/>
                        <br/><br/>
                        新型コロナウイルスに関する無料相談<br/>
                        以下流れに沿って、どなたでも相談できます。<br/>
                    </p>
                    <div class="col-2ml-auto">
                        <img src="/images/svg/img-clock-grey.svg">
                        <span id="date">2020/10/26</span>
                    </div>
                </div>
            </div>
            <div class="col-12 bg-white" style="margin-bottom:80px">
                {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <div class="row">
                        <div class="col text-center btnLayer">
                            <a href="{{route("post.detail", $postId)}}" class="btnSubmit btnUnselected">相談詳細へ</a>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>

    </div>
</div>
@endsection
