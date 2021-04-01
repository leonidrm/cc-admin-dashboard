@extends('member.layouts.member')

@section('content')
    <!-- page content -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>{{ __('views.member.dashboard.sub_title_0') }}</h3>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>

                <div class="clearfix"></div>
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
