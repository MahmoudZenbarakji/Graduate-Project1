<?php

namespace App\Http\Requests;

use App\Models\Education;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEducationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('education_edit');
    }

    public function rules()
    {
        return [
            'header' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'organization' => [
                'string',
                'required',
            ],
            'applicant_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
