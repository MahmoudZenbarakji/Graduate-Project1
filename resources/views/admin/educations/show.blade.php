@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.education.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.educations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.id') }}
                        </th>
                        <td>
                            {{ $education->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.header') }}
                        </th>
                        <td>
                            {{ $education->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.description') }}
                        </th>
                        <td>
                            {{ $education->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.start_date') }}
                        </th>
                        <td>
                            {{ $education->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.end_date') }}
                        </th>
                        <td>
                            {{ $education->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.organization') }}
                        </th>
                        <td>
                            {{ $education->organization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.applicant') }}
                        </th>
                        <td>
                            {{ $education->applicant->full_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.educations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection