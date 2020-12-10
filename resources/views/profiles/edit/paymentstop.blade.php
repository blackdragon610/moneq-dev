@extends('layouts/front', ["type" => 1])


@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white input-form-style">
                <p class="title-medium">課金の停止</p>

                <div class="col text-center" style="margin-top:48px">
                    <p class="title-16px">課金を停止させたため、無料会員になりました。</p>

                    <a href="{{route('profiles.manage')}}" class="btn btnSubmit btnUnselected">会員情報に戻る</a>

                </div>

            </div>
        </div>

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
