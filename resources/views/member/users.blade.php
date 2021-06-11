@extends('member.layouts.member')

@section('title',__('views.member.users.title', ['name' => $company->name]) )

@section('content')
    <div class="clearfix"></div>

    <div class="users-page clearfix">
        <div class="tabs clearfix">
            <ul class="tab-header">
                @foreach($clients as $client)
                    <li @if ($loop->first)class="active"@endif>
                        <a href="#tab-{{ $client->id }}" data-toggle="tab">
                            <span class="name">{{ $client->name }}</span>
                            <span class="email">{{ $client->email }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($clients as $client)
                    <div class="tab-pane fade @if($loop->first) in active @endif" id="tab-{{ $client->id }}">
                        <div class="client-details">
                            <table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $client->id }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.company') }}</td>
                                    <td>{{ $client->company->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.user_name') }}</td>
                                    <td>{{ $client->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.email') }}</td>
                                    <td>{{ $client->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.status') }}</td>
                                    <td>
                                        @if($client->active)
                                            <span class="label label-primary">{{ __('views.member.users.active') }}</span>
                                        @else
                                            <span class="label label-danger">{{ __('views.member.users.inactive') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.confirmed') }}</td>
                                    <td>
                                        @if($client->confirmed)
                                            <span class="label label-success">{{ __('views.member.users.confirmed') }}</span>
                                        @else
                                            <span class="label label-warning">{{ __('views.member.users.not_confirmed') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.created_at') }}</td>
                                    <td>{{ $client->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.updated_at') }}</td>
                                    <td>{{ $client->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.member.users.last_login') }}</td>
                                    <td>{{ $client->last_login }}</td>
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
