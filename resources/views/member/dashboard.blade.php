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
                        <h2>{{ __('views.member.dashboard.revenue') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="revenue"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.bounces') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="bounces"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.bounce_rate') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="bounce_rate"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.click_rate') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="click_rate"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.open_rate') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="open_rate"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.placed_order_rate') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="placed_order_rate"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.spam_complaints') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="spam_complaints"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.spam_complaints_rate') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="spam_complaints_rate"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.successful_deliveries') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="successful_deliveries"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.total_clicks') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="total_clicks"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.total_opens') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="total_opens"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.total_recipients') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="total_recipients"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.unique_clicks') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="unique_clicks"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.unique_opens') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="unique_opens"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.unique_placed_orders') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="unique_placed_orders"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.unsubscribes') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="unsubscribes"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="x_panel">
                    <div class="x_title clearfix">
                        <h2>{{ __('views.member.dashboard.winning') }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                    </div>

                    <div class="x_content">
                        <canvas id="winning"></canvas>
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
