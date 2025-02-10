<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
            'salary_id' => [
                'required',
                'integer',
            ],
            'experiences_year' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'working_hour' => [
                'string',
                'required',
            ],
            'closed_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
        ];
    }
}
