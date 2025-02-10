@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.applicant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.id') }}
                        </th>
                        <td>
                            {{ $applicant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.user') }}
                        </th>
                        <td>
                            {{ $applicant->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.full_name') }}
                        </th>
                        <td>
                            {{ $applicant->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.education_level') }}
                        </th>
                        <td>
                            {{ App\Models\Applicant::EDUCATION_LEVEL_SELECT[$applicant->education_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.experience_year') }}
                        </th>
                        <td>
                            {{ $applicant->experience_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.salary') }}
                        </th>
                        <td>
                            {{ $applicant->salary->range ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.nationality') }}
                        </th>
                        <td>
                            {{ $applicant->nationality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Applicant::GENDER_SELECT[$applicant->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.other_phone_number') }}
                        </th>
                        <td>
                            {{ $applicant->other_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $applicant->birth_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.image') }}
                        </th>
                        <td>
                            @if($applicant->image)
                                <a href="{{ $applicant->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $applicant->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.skills') }}
                        </th>
                        <td>
                            @foreach($applicant->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.job_types') }}
                        </th>
                        <td>
                            @foreach($applicant->job_types as $key => $job_types)
                                <span class="label label-info">{{ $job_types->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection