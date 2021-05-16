@extends('admin.layouts.admin')

@section('title',__('views.admin.company.add.title') )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.companies.create'], 'enctype' => 'multipart/form-data', 'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    {{ __('views.admin.company.add.name') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
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
                    {{ __('views.admin.company.add.logo') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="logo" type="file"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('logo')) parsley-error @endif"
                           name="logo" required>
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
                    {{ __('views.admin.company.add.industry') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="industry" name="industry" class="select2" style="width: 100%" autocomplete="off">
                        <option></option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
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
                       href="{{ URL::previous() }}"> {{ __('views.admin.company.add.cancel') }}</a>
                    <button type="submit" class="btn btn-success"> {{ __('views.admin.company.add.save') }}</button>
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
