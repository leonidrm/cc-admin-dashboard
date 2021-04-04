@extends('admin.layouts.admin')

@section('title',__('views.admin.campaign.upload.title') )

@section('content')
    <div class="row">
        @if(isset($errorMessages))
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if($errorMessages === [])
                    <div class="alert alert-success" role="alert">
                        CSV File  successfully uploaded
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        @foreach($errorMessages as $errorMessage)
                            <p>Please contact Admin!!!</p>
                            <p>{{ $errorMessage }}</p>
                            <br>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.campaign.parse'], 'enctype' => 'multipart/form-data', 'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="industry">
                    {{ __('views.admin.campaign.upload.company') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="company" name="company" class="select2" style="width: 100%" autocomplete="off">
                        <option></option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('company'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('company') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="csv">
                    {{ __('views.admin.company.upload.csv') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="csv" type="file"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('csv')) parsley-error @endif"
                           name="csv" required>
                    @if($errors->has('csv'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('csv') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary"
                       href="{{ URL::previous() }}"> {{ __('views.admin.campaign.upload.cancel') }}</a>
                    <button type="submit" class="btn btn-success"> {{ __('views.admin.campaign.upload.upload') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/admin.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/campaign.js')) }}
@endsection
