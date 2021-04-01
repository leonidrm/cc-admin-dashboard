@extends('admin.layouts.admin')

@section('title', __('views.admin.industries.index.title'))

@section('content')
    <div class="row">
        <a class="btn btn-info pull-right" href="{{ route('admin.industries.add') }}"
           data-toggle="tooltip" data-placement="top"
           data-title="{{ __('views.admin.industries.index.add') }}">
            <i class="fa fa-pencil"></i>
        </a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name', __('views.admin.industries.index.name'),['page' =>
                    $industries->currentPage()])
                </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($industries as $industry)
                <tr>
                    <td>{{ $industry->name }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.industries.show', [$industry->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.industries.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.industries.edit', [$industry->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.industries.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $industries->links() }}
        </div>
    </div>
@endsection
