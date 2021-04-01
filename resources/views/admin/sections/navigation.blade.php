<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
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

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.campaign.upload') }}">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.campaign-upload') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_1') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.industries') }}">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.industries') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.companies') }}">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.companies') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.clients') }}">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.clients') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.users') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.restore') }}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_3') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
