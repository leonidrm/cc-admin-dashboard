@extends('admin.layouts.admin')

{{-- Overwriting the default section --}}
@section('title')
    {!! __('views.admin.company.users.title', ['url' => asset('/storage/images/companies/' . $company->logo), 'name' => $company->name]) !!}
@overwrite

@section('content')
    <div class="clearfix"></div>

    <div class="company-page clearfix">
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
                                    <td>{{ __('views.admin.clients.index.company') }}</td>
                                    <td>{{ $client->company->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.user_name') }}</td>
                                    <td>{{ $client->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.email') }}</td>
                                    <td>{{ $client->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.status') }}</td>
                                    <td>
                                        @if($client->active)
                                            <span class="label label-primary">{{ __('views.admin.clients.index.active') }}</span>
                                        @else
                                            <span class="label label-danger">{{ __('views.admin.clients.index.inactive') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.confirmed') }}</td>
                                    <td>
                                        @if($client->confirmed)
                                            <span class="label label-success">{{ __('views.admin.clients.index.confirmed') }}</span>
                                        @else
                                            <span class="label label-warning">{{ __('views.admin.clients.index.not_confirmed') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.created_at') }}</td>
                                    <td>{{ $client->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.updated_at') }}</td>
                                    <td>{{ $client->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('views.admin.clients.index.last_login') }}</td>
                                    <td>{{ $client->last_login }}</td>
                                </tr>
                                @if($client->deleted_at)
                                <tr>
                                    <td>{{ __('views.admin.clients.index.deleted_at') }}</td>
                                    <td>{{ $client->deleted_at }}</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>

                            <div class="actions">
                                @if(!$client->deleted_at)
                                <a class="btn btn-info" href="{{ route('admin.clients.edit', [$client->id]) }}">
                                    {{ __('views.admin.clients.index.edit') }}
                                </a>
                                @endif

                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator'))
                                    @if($client->deleted_at)
                                        <a class="btn btn-primary" href="{{ route('admin.clients.restore-client', [$client->id]) }}">
                                            {{ __('views.admin.users.index.restore') }}
                                        </a>
                                    @else
                                        <a href="{{ route('admin.clients.destroy', [$client->id]) }}" class="btn btn-danger">
                                            {{ __('views.admin.clients.index.delete') }}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
