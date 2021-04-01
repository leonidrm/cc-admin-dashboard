@extends('admin.layouts.admin')

@section('title', __('views.admin.clients.show.title', ['name' => $client->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.clients.show.company-logo') }}</th>
                <td><img src="{{ $client->company->logo }}" class="company-logo"></td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.company') }}</th>
                <td>{{ $client->company->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.name') }}</th>
                <td>{{ $client->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.email') }}</th>
                <td>
                    <a href="mailto:{{ $client->email }}">
                        {{ $client->email }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>{{ __('views.admin.clients.show.active') }}</th>
                <td>
                    @if($client->active)
                        <span class="label label-primary">{{ __('views.admin.clients.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.clients.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.confirmed') }}</th>
                <td>
                    @if($client->confirmed)
                        <span class="label label-success">{{ __('views.admin.clients.show.confirmed') }}</span>
                    @else
                        <span class="label label-warning">{{ __('views.admin.clients.show.not_confirmed') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.created_at') }}</th>
                <td>{{ $client->created_at }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.updated_at') }}</th>
                <td>{{ $client->updated_at }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.clients.show.last_login') }}</th>
                <td>@if($client->last_login) {{ $client->last_login }} ({{ $client->last_login->diffForHumans() }}) @endif</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
