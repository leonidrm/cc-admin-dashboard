@extends('admin.layouts.admin')

@section('title',__('views.admin.company.edit.title', ['name' => $company->name]) )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.companies.update', $company], 'enctype' => 'multipart/form-data', 'method' => 'put','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                    {{ __('views.admin.company.edit.status') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="status" type="checkbox" class="status-toggle" data-toggle="toggle" @if($company->active) checked @endif>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    {{ __('views.admin.company.edit.name') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                           @if($company->name) value="{{$company->name}}" @endif
                           name="name" required>
                    @if($errors->has('name'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('name') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">
                    {{ __('views.admin.company.edit.logo') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    @if($company->logo)
                        <img class="image rounded-circle" src="{{storage_path() . '/images/companies/' . $company->logo}}"
                             alt="company_logo" style="width: 80px;height: 80px; padding: 10px; margin: 0;">
                    @endif
                    <input id="logo" type="file"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('logo')) parsley-error @endif"
                           name="logo">
                    @if($errors->has('logo'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('logo') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="industry">
                    {{ __('views.admin.company.edit.industry') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="industry" name="industry" class="select2" style="width: 100%" autocomplete="off" required>
                        @foreach($industries as $industry)
                            <option @if($company->industry->id === $industry->id) selected @endif value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('industry'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('industry') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary"
                       href="{{ URL::previous() }}"> {{ __('views.admin.company.edit.cancel') }}</a>
                    <button type="submit" class="btn btn-success"> {{ __('views.admin.company.edit.update') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/companies.js')) }}
@endsection
