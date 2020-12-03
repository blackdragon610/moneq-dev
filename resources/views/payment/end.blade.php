@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium">決済</p>

                <div class="col text-center" style="margin-top:48px">
                    <p class="title-16px">決済が完了しました。</p>
                    <p class="title-16px" style="margin-top:48px">\ さっそく、お金の悩みを専門家に相談する /</p>

                    <a href="{{route('post.create')}}" class="btn yellow-roundbtn">今すぐ、専門家に相談する</a>
                    
                    <div class="input-group col-lg-6 offset-lg-3 col-md-12" style="margin-top:60px" id="searchbar">
                        <input type="searchSubTxt" class="form-control py-1 amber-border" style="width:370px;height:48px" type="text" placeholder="お金の悩みを検索" >
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary">
                                <i class="fa fa-search fa-1x"></i>
                            </button>
                        </div>
                    </div>
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
