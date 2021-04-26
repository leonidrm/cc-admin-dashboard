@extends('member.layouts.member')

@section('content')
    <!-- page content -->
    <div class="clearfix"></div>

    <h1 class="username"><span data-username></span> - <span data-company></span></h1>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>Revenue</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="newslettersRevenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>Bounces</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="newslettersBouncesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>Bounce rate</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="newslettersBounceRateChart"></canvas>
                    </div>
                </div>
            </div>


        </div>
    </div>






























    <!-- page content -->
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/member/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/member/css/dashboard.css')) }}
@endsection
