@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.update", [$application->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="job_id">{{ trans('cruds.application.fields.job') }}</label>
                <select class="form-control select2 {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job_id" id="job_id" required>
                    @foreach($jobs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('job_id') ? old('job_id') : $application->job->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $application->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_study">{{ trans('cruds.application.fields.start_study') }}</label>
                <input class="form-control date {{ $errors->has('start_study') ? 'is-invalid' : '' }}" type="text" name="start_study" id="start_study" value="{{ old('start_study', $application->start_study) }}">
                @if($errors->has('start_study'))
                    <span class="text-danger">{{ $errors->first('start_study') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.start_study_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="applicant_id">{{ trans('cruds.application.fields.applicant') }}</label>
                <select class="form-control select2 {{ $errors->has('applicant') ? 'is-invalid' : '' }}" name="applicant_id" id="applicant_id" required>
                    @foreach($applicants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applicant_id') ? old('applicant_id') : $application->applicant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applicant'))
                    <span class="text-danger">{{ $errors->first('applicant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.applicant_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection