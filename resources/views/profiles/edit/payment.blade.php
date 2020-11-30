@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

        <div class="row">
            <section class="col-12">
                <article class="bg-white col-12">
                    <h5 class="font-weight-bold mb-2">クレジットカード</h5>
                    <hr>
                    <p>ご利用可能なクレジットカード</p>
                    <p>VISA／Mastercard／JCB／AMEX／Diners／Orico／CF／JACCS／Life／eLIO</p>
                    <div class="row">
                        <div class="col">
                            <img src="/images/svg/img-ranking-1.svg">
                            <img src="/images/svg/img-ranking-1.svg">
                            <img src="/images/svg/img-ranking-1.svg">
                            <img src="/images/svg/img-ranking-1.svg">
                            <img src="/images/svg/img-ranking-1.svg">

                        </div>
                        <div class="col text-center">
                            <a class="btn btn-danger" href="{{url('profile/manage/payment/update/1')}}" id="cardBtn">クレジット決済を押す</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <a id="car1" class="btn btn-danger" href="{{url('profile/manage/payment/update/2')}}"><img src="/images/svg/img-ranking-1.svg"></a>
                        <a id="car2" class="btn btn-danger" href="{{url('profile/manage/payment/update/3')}}"><img src="/images/svg/img-ranking-2.svg"></a>
                        <a id="car3" class="btn btn-danger" href="{{url('profile/manage/payment/update/4')}}"><img src="/images/svg/img-ranking-3.svg"></a>
                    </div>
                    </article>
            </section>
        </div>

    {{-- {{Form::close()}} --}}

    </div>
</div>

@endsection
