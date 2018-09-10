@extends('layouts.app')

@section('content')
    <style>
        .wizard {
            margin: 20px auto;
            background: #fff;
        }

        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a,
        .wizard .nav-tabs > li.active > a:hover,
        .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }

        span.round-tab i {
            color: #555555;
        }

        .wizard li a.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;

        }

        .wizard li a.active span.round-tab i {
            color: #5bc0de;
        }

        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs > li {
            width: 19%;
        }

        .wizard li a:after {
            content: " ";
            position: relative;
            left: 46%;
            top: -20px;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }

        .wizard li.active.nav-item:after {
            content: " ";
            position: relative;
            left: 46%;
            top: -20px;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }

        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
            position: relative;
        }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }

        .wizard h3 {
            margin-top: 0;
        }

        @media( max-width: 585px) {

            .wizard {
                width: 90%;
                height: auto !important;
            }

            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }
    </style>
    <div class="main-content">
        <div class="row">
            <div class="container text-center">
                <div class="col-md-12 col-md-offset-0 center-block text-center">
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <!------ Include the above in your HEAD tag ---------->




                    <div class="form cf">
                        @include('include.messages')
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs center-block" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-book"></i>
                                </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-upload"></i>
                                </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-check"></i>
                                </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                            <div class="tab-content">
                                <div class="panel container center-block col-sm-8" >
                                    {{--<h1 class="text-md-center">Step 1</h1>--}}
                                    {{--<div class="row">--}}

                                    {{--</div>--}}
                                    {{--<ul class="list-inline text-md-center">--}}
                                        {{--<li><button type="button" class="btn btn-lg btn-common next-step next-button">Get Started Now</button></li>--}}
                                    {{--</ul>--}}
                                    <div class="col-md-6 col-lg-6">
                                        {{Form::open(['route' => ['disburseStep2']])}}
                                        <div class="form-group">
                                            {{Form::label('TempName', 'Template Name')}}

                                            {{Form::text('TempName', '',["class" => "form-control", "placeholder" => "July"])}}
                                        </div>
                                        <div class="bottom">
                                            {{FORM::submit('Submit',["class" => "btn btn-primary"])}}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--script--}}
    <script>
        //jQuery time
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {
            var $active = $('.wizard .nav-tabs .nav-item .active');
            var $activeli = $active.parent("li");

            $($activeli).next().find('a[data-toggle="tab"]').removeClass("disabled");
            $($activeli).next().find('a[data-toggle="tab"]').click();
        });


        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs .nav-item .active');
            var $activeli = $active.parent("li");

            $($activeli).prev().find('a[data-toggle="tab"]').removeClass("disabled");
            $($activeli).prev().find('a[data-toggle="tab"]').click();

        });

    </script>
@endsection
