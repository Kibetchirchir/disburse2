@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                            <button class="au-btn au-btn-icon au-btn--blue2" onclick="location.href='{{ url('/addUser') }}'">
                                <i class="zmdi zmdi-plus"></i>add user</button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-delete"></i>
                                    </div>
                                    <div class="text">
                                        <h2>10368</h2>
                                        <span>pending authorisation</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-ticket-star"></i>
                                    </div>
                                    <div class="text">
                                        <h2> Kes 388,688</h2>
                                        <span>disbursed total</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>Kes 1,086</h2>
                                        <span>disbursed this week</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>Kes 1,060,386</h2>
                                        <span>total disbursed</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Aproval</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="property">
                                            <option selected="selected">All Properties</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="time">
                                            <option selected="selected">Today</option>
                                            <option value="">3 Days</option>
                                            <option value="">1 Week</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                                </div>
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>batch</th>
                                        <th>user upload</th>
                                        <th>number of beneficiaries</th>
                                        <th>date</th>
                                        <th>status</th>
                                        <th>total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>04524</td>
                                        <td>
                                            <span class="block-email">chirchir</span>
                                        </td>
                                        <td class="desc">20</td>
                                        <td>2018-09-27 02:12</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>KES 6790.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                {{--<button class="item" data-toggle="tooltip" data-placement="top" title="aprove">--}}
                                                    {{--<i class="zmdi zmdi-accounts-add"></i>--}}
                                                {{--</button>--}}
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Aprove">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                {{--<button class="item" data-toggle="tooltip" data-placement="top" title="Delete">--}}
                                                    {{--<i class="zmdi zmdi-delete"></i>--}}
                                                {{--</button>--}}
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">Recent Disbursed</h2>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>batch ID</th>
                                                <th>Authoriser</th>
                                                <th class="text-right">uploaded by</th>
                                                <th class="text-right">no of ben</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100398</td>
                                                <td>chirchir</td>
                                                <td class="text-right">cate</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">Kes 9990.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
