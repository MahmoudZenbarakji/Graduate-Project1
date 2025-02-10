<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_create');
    }

    public function rules()
    {
        return [
            'job_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'start_study' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'applicant_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
