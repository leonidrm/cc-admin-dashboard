@extends('admin.layouts.admin')

@section('title', __('views.admin.company.index.title'))

@section('content')
    <div class="row">
        <a class="btn btn-info pull-right" href="{{ route('admin.companies.add') }}"
           data-toggle="tooltip" data-placement="top"
           data-title="{{ __('views.admin.companies.index.add') }}">
            <i class="fa fa-pencil"></i>
        </a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>@sortablelink('logo', __('views.admin.company.index.logo'),['page' => $companies->currentPage()])
                </th>
                <th>@sortablelink('name', __('views.admin.company.index.name'),['page' => $companies->currentPage()])
                </th>
                <th>@sortablelink('industry', __('views.admin.company.index.industry'),['page' =>
                    $companies->currentPage()])
                </th>
                <th>@sortablelink('active', __('views.admin.company.index.status'),['page' =>
                    $companies->currentPage()])
                </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>
                        @if($company->logo)
                            <img class="image rounded-circle" src="{{asset('/storage/images/companies/' . $company->logo)}}"
                                 alt="company_logo" style="width: 80px;height: 80px; padding: 10px; margin: 0;">
                        @endif
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->industry->name }}</td>
                    <td>
                        @if($company->active)
                            <span class="label label-primary">{{ __('views.admin.company.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.company.index.inactive') }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.companies.show', [$company->id]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.admin.company.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a class="btn btn-xs btn-info" href="{{ route('admin.companies.edit', [$company->id]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.admin.company.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $companies->links() }}
        </div>
    </div>
@endsection
