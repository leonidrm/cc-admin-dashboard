@extends('admin.layouts.admin')

@section('title', __('views.admin.industries.show.title', ['name' => $industry->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.industries.show.table_name') }}</th>
                <td>{{ $industry->name }}</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
