@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workExpenrience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.work-expenriences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.id') }}
                        </th>
                        <td>
                            {{ $workExpenrience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.header') }}
                        </th>
                        <td>
                            {{ $workExpenrience->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.description') }}
                        </th>
                        <td>
                            {{ $workExpenrience->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.start_date') }}
                        </th>
                        <td>
                            {{ $workExpenrience->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.end_date') }}
                        </th>
                        <td>
                            {{ $workExpenrience->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.organization') }}
                        </th>
                        <td>
                            {{ $workExpenrience->organization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workExpenrience.fields.applicant') }}
                        </th>
                        <td>
                            {{ $workExpenrience->applicant->full_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.work-expenriences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection