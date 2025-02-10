<?php

namespace App\Http\Requests;

use App\Models\Applicant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applicant_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'education_level' => [
                'required',
            ],
            'experience_year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'salary_id' => [
                'required',
                'integer',
            ],
            'nationality_id' => [
                'required',
                'integer',
            ],
            'gender' => [
                'required',
            ],
            'other_phone_number' => [
                'string',
                'nullable',
            ],
            'birth_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
            'job_types.*' => [
                'integer',
            ],
            'job_types' => [
                'required',
                'array',
            ],
        ];
    }
}
