@extends('member.layouts.member')

@section('content')
    <!-- page content -->

    <h1 class="username"><span data-username></span> (<span data-company></span>)</h1>













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
