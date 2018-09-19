@extends('layouts.app')

@section('content')
    <style>
        /*@todo This is temp - move to styles*/
        h3 {
            border: none !important;
            font-size: 30px;
            text-align: center;
            margin: 0;
            margin-bottom: 30px;
            letter-spacing: .2em;
            font-weight: 200;
        }

        .order_header {
            text-align: center
        }

        .order_header .massive-icon {
            display: block;
            width: 120px;
            height: 120px;
            font-size: 100px;
            margin: 0 auto;
            color: #63C05E;
        }

        .order_header h1 {
            margin-top: 20px;
            text-transform: uppercase;
        }

        .order_header h2 {
            margin-top: 5px;
            font-size: 20px;
        }

        .order_details.well, .offline_payment_instructions {
            margin-top: 25px;
            background-color: #FCFCFC;
            line-height: 30px;
            text-shadow: 0 1px 0 rgba(255,255,255,.9);
            color: #656565;
            overflow: hidden;
        }

        .ticket_download_link {
            border-bottom: 3px solid;
        }
    </style>

    <div class="main-content">
        <section id="order_form" class="container">
            <div class="row">
                <div class="col-md-12 order_header">
            <span class="massive-icon">
                <i class="ico ico-checkmark-circle"></i>
            </span>
                    <h1>Awaitng aproval!</h1>
                    <h2>
                        Once aproved the funds will be disbursed
                    </h2>
                </div>
            </div>

            <div class="order_details well">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <b>BatchNo</b><br>{{$batch}}
                    </div>

                    <div class="col-sm-4 col-xs-6">
                        <b>Amount</b><br>{{$amount}}
                    </div>

                    {{--<div class="col-sm-4 col-xs-6">--}}
                        {{--<b>Amount</b><br>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-4 col-xs-6">--}}
                        {{--<b>Reference</b><br>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-4 col-xs-6">--}}
                        {{--<b>Date</b><br>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-4 col-xs-6">--}}
                        {{--<b>Email</b><br>--}}
                    {{--</div>--}}
                </div>
            </div>

        </section>
    </div>
@endsection