<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title">
            <a href="{{ route('member.dashboard') }}" class="site_title">
                {{--<span>{{ config('app.name') }}</span>--}}
                <img src="{{ asset('/storage/images/companies/' . $company->logo) }}" alt="" />
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ __('views.member.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('member.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.member.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('member.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.member.section.navigation.users') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('member.campaigns') }}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            {{ __('views.member.section.navigation.campaigns') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
