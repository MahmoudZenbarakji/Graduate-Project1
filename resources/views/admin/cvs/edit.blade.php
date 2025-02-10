@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cv.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cvs.update", [$cv->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cv">{{ trans('cruds.cv.fields.cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('cv'))
                    <span class="text-danger">{{ $errors->first('cv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cv.fields.cv_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_main') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_main" value="0">
                    <input class="form-check-input" type="checkbox" name="is_main" id="is_main" value="1" {{ $cv->is_main || old('is_main', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_main">{{ trans('cruds.cv.fields.is_main') }}</label>
                </div>
                @if($errors->has('is_main'))
                    <span class="text-danger">{{ $errors->first('is_main') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cv.fields.is_main_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cv_title">{{ trans('cruds.cv.fields.cv_title') }}</label>
                <input class="form-control {{ $errors->has('cv_title') ? 'is-invalid' : '' }}" type="text" name="cv_title" id="cv_title" value="{{ old('cv_title', $cv->cv_title) }}" required>
                @if($errors->has('cv_title'))
                    <span class="text-danger">{{ $errors->first('cv_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cv.fields.cv_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="applicant_id">{{ trans('cruds.cv.fields.applicant') }}</label>
                <select class="form-control select2 {{ $errors->has('applicant') ? 'is-invalid' : '' }}" name="applicant_id" id="applicant_id" required>
                    @foreach($applicants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applicant_id') ? old('applicant_id') : $cv->applicant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applicant'))
                    <span class="text-danger">{{ $errors->first('applicant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cv.fields.applicant_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('admin.cvs.storeMedia') }}',
    maxFilesize: 15, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15
    },
    success: function (file, response) {
      $('form').find('input[name="cv"]').remove()
      $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($cv) && $cv->cv)
      var file = {!! json_encode($cv->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection