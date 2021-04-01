@extends('layouts.app')

@section('body_class','nav-md')
@include('member.layouts.flash-messages')
@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('member.sections.navigation')
                @include('member.sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('title')</h1>
                    </div>
                    @if(Breadcrumbs::exists())
                        <div class="title_right">
                            <div class="pull-right">
                                {!! Breadcrumbs::render() !!}
                            </div>
                        </div>
                    @endif
                </div>
                @yield('content')
            </div>

            <footer>
                @include('member.sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{ Html::style(mix('assets/member/css/member.css')) }}
@endsection

@section('scripts')
    {{ Html::script(mix('assets/member/js/member.js')) }}
@endsection
