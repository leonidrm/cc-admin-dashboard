@extends('admin.layouts.admin')

@section('title', __('views.admin.company.show.title', ['name' => $company->name]))

@section('content')
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->email }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->roles->pluck('name')->implode(',') }}</td>
            <td>
                @if($client->active)
                    <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                @else
                    <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                @endif
            </td>
            <td>
                @if($client->confirmed)
                    <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                @else
                    <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                @endif</td>
            <td>{{ $client->created_at }}</td>
            <td>{{ $client->updated_at }}</td>
            <td>
                <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.restore-client', [$client->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.restore') }}">
                    <i class="fa fa-undo"></i>
                </a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>











    {{ $company->name }}















@endsection
