<?php

namespace App\Http\Requests;

use App\Models\WorkExpenrience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWorkExpenrienceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('work_expenrience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:work_expenriences,id',
        ];
    }
}
