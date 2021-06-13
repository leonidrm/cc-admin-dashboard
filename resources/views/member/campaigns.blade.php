@extends('member.layouts.member')

@section('title',__('views.member.campaigns.title', ['name' => $company->name]) )

@section('content')
    <div class="clearfix"></div>

    <div class="users-page clearfix">
        <div class="tabs clearfix">
            <ul class="tab-header">
                @foreach($campaigns as $campaign)
                    <li @if ($loop->first)class="active"@endif>
                        <a href="#tab-{{ $campaign->id }}" data-toggle="tab">
                            <span class="name">{{ $campaign->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($campaigns as $campaign)
                    <div class="tab-pane fade @if($loop->first) in active @endif" id="tab-{{ $campaign->id }}">
                        <div class="client-details">
                            <table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $campaign->id }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.user_name') }}</td>
                                    <td>{{ $campaign->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.created_at') }}</td>
                                    <td>{{ $campaign->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.updated_at') }}</td>
                                    <td>{{ $campaign->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
