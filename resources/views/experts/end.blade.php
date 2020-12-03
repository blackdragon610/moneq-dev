@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">完了</h5>
                    <hr class="mt-2 mb-3"/>

                    <p>メッセージを送信しました。</p>

                    <div class="col text-center">
                        <a href="{{route('post.create')}}" class="btn btnSubmit">今すぐ、専門家に相談する</a>
                        <p class="mt-5">お金相談Q&Aを検索する</p>
                        <div class="input-group col-lg-6 offset-lg-3 col-md-12 pl-0 p-3">
                            <input id="searchSubTxt" class="form-control py-1 amber-border" type="text" placeholder="保険" aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search text-grey"></i></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </section>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#searchSubTxt').on('keyup', function(){

            var text = $('#searchSubTxt').val();

            $.ajax({

                type:"GET",
                url: "{{url('search')}}" + '/' + text,
                success: function(response) {
                    var keyArray= [];
                    response = JSON.parse(response);
                    for (var patient of response) {
                        keyArray.push(patient['keyword']);
                    }
                    $( "#searchSubTxt" ).autocomplete({
                        source: keyArray
                    });
                }
            });
        });

    });
</script>

@endsection
