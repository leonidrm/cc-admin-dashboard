@extends('admin.layouts.admin')

@section('title', __('views.admin.company.show.title', ['name' => $company->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.company.show.table_logo') }}</th>
                @if($company->logo)
                    <td>
                        <img class="company-logo" src="{{asset('/storage/images/companies/' . $company->logo)}}" alt="company_logo" />
                    </td>
                @endif
            </tr>

            <tr>
                <th>{{ __('views.admin.company.show.table_name') }}</th>
                <td>{{ $company->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.company.show.table_industry') }}</th>
                <td>{{ $company->industry->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.company.show.table_status') }}</th>
                <td>
                    @if($company->active)
                        <span class="label label-primary">{{ __('views.admin.company.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.company.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.company.show.table_created_at') }}</th>
                <td>{{ $company->created_at }} ({{ $company->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.company.show.table_updated_at') }}</th>
                <td>{{ $company->updated_at }} ({{ $company->updated_at->diffForHumans() }})</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
