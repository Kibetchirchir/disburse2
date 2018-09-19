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
            .pt-3-half {
                padding-top: 1.4rem;
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
                                        <a href="" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-book"></i>
                                </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-upload"></i>
                                </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-check"></i>
                                </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="panel container center-block col-md-12 col-lg-12" >
                                    <div class="card">
                                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
                                        <div class="card-body">
                                            <div id="table" class="table-editable">
                                                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>
                                                <table class="table table-bordered table-responsive-md table-striped text-center">
                                                    <tr>
                                                        <th class="text-center">first Name</th>
                                                        <th class="text-center">second Name</th>
                                                        <th class="text-center">Account</th>
                                                        <th class="text-center">Bank Name</th>
                                                        <th class="text-center">Amount</th>
                                                        <th class="text-center">identity</th>
                                                        <th class="text-center">Sort</th>
                                                        <th class="text-center">Remove</th>
                                                    </tr>
                                                    @if(isset($client))
                                                        @foreach($client as $client)
                                                            <tr>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->firstName}}</td>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->secondName}}</td>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->account}}</td>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->bankName}}</td>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->amount}}</td>
                                                                <td class="pt-3-half" contenteditable="true">{{$client->identity}}</td>
                                                                <td class="pt-3-half">
                                                                    <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                                                    <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                                                </td>
                                                                <td>
                                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editable table -->

                                    </div>
                                </div>
                            </div>
                        <?php
                        $batchNo=12;
                        ?>
                        <div class="footer">
                            {!! Form::open(array('url' => route('disburse', array('tempId' => $tempId)))) !!}
                            {!! Form::button('Cancel', ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                            {!! Form::submit('Disburse', ['class'=>"btn btn-success"]) !!}
                            {!! Form::close() !!}
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
        /**
         * table
         */
        var $TABLE = $('#table');
        var $BTN = $('#export-btn');
        var $EXPORT = $('#export');

        $('.table-add').click(function () {
            var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
            $TABLE.find('table').append($clone);
        });

        $('.table-remove').click(function () {
            $(this).parents('tr').detach();
        });

        $('.table-up').click(function () {
            var $row = $(this).parents('tr');
            if ($row.index() === 1) return; // Don't go above the header
            $row.prev().before($row.get(0));
        });

        $('.table-down').click(function () {
            var $row = $(this).parents('tr');
            $row.next().after($row.get(0));
        });

        // A few jQuery helpers for exporting only
        jQuery.fn.pop = [].pop;
        jQuery.fn.shift = [].shift;

        $BTN.click(function () {
            var $rows = $TABLE.find('tr:not(:hidden)');
            var headers = [];
            var data = [];

            // Get the headers (add special header logic here)
            $($rows.shift()).find('th:not(:empty)').each(function () {
                headers.push($(this).text().toLowerCase());
            });

            // Turn all existing rows into a loopable array
            $rows.each(function () {
                var $td = $(this).find('td');
                var h = {};

                // Use the headers from earlier to name our hash keys
                headers.forEach(function (header, i) {
                    h[header] = $td.eq(i).text();
                });

                data.push(h);
            });

            // Output the result
            $EXPORT.text(JSON.stringify(data));
        });
    </script>
@endsection
