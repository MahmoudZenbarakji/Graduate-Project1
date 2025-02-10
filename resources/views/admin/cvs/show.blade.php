@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cv.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cvs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.id') }}
                        </th>
                        <td>
                            {{ $cv->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.cv') }}
                        </th>
                        <td>
                            @if($cv->cv)
                                <a href="{{ $cv->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.is_main') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $cv->is_main ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.cv_title') }}
                        </th>
                        <td>
                            {{ $cv->cv_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.applicant') }}
                        </th>
                        <td>
                            {{ $cv->applicant->full_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cvs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection