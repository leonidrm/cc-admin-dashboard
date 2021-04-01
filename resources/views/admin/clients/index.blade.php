@extends('admin.layouts.admin')

@section('title', __('views.admin.clients.index.title'))

@section('content')
    <div class="row">
        <a class="btn btn-info pull-right" href="{{ route('admin.clients.add') }}"
           data-toggle="tooltip" data-placement="top"
           data-title="{{ __('views.admin.clients.index.add') }}">
            <i class="fa fa-user"></i>
        </a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('company', __('views.admin.clients.index.company'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('email', __('views.admin.clients.index.email'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.clients.index.name'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.clients.index.status'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('confirmed', __('views.admin.clients.index.confirmed'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.clients.index.created_at'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.clients.index.updated_at'),['page' => $clients->currentPage()])</th>
                <th>@sortablelink('last_login', __('views.admin.clients.index.last_login'),['page' => $clients->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>@if($client->company) {{ $client->company->name }} @endif</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->name }}</td>
                    <td>
                        @if($client->active)
                            <span class="label label-primary">{{ __('views.admin.clients.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.clients.index.inactive') }}</span>
                        @endif
                    </td>
                    <td>
                        @if($client->confirmed)
                            <span class="label label-success">{{ __('views.admin.clients.index.confirmed') }}</span>
                        @else
                            <span class="label label-warning">{{ __('views.admin.clients.index.not_confirmed') }}</span>
                        @endif</td>
                    <td>{{ $client->created_at }}</td>
                    <td>{{ $client->updated_at }}</td>
                    <td>{{ $client->last_login }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', [$client->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.clients.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', [$client->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.clients.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @if(!$client->hasRole('administrator'))
                            <a href="{{ route('admin.clients.destroy', [$client->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.clients.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $clients->links() }}
        </div>
    </div>
@endsection
