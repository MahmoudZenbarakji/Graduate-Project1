@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.education.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.educations.update", [$education->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="header">{{ trans('cruds.education.fields.header') }}</label>
                <input class="form-control {{ $errors->has('header') ? 'is-invalid' : '' }}" type="text" name="header" id="header" value="{{ old('header', $education->header) }}" required>
                @if($errors->has('header'))
                    <span class="text-danger">{{ $errors->first('header') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.header_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.education.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $education->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.education.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $education->start_date) }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.education.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $education->end_date) }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organization">{{ trans('cruds.education.fields.organization') }}</label>
                <input class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}" type="text" name="organization" id="organization" value="{{ old('organization', $education->organization) }}" required>
                @if($errors->has('organization'))
                    <span class="text-danger">{{ $errors->first('organization') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.organization_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="applicant_id">{{ trans('cruds.education.fields.applicant') }}</label>
                <select class="form-control select2 {{ $errors->has('applicant') ? 'is-invalid' : '' }}" name="applicant_id" id="applicant_id" required>
                    @foreach($applicants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applicant_id') ? old('applicant_id') : $education->applicant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applicant'))
                    <span class="text-danger">{{ $errors->first('applicant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.applicant_helper') }}</span>
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