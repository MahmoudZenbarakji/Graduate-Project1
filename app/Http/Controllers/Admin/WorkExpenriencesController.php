<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkExpenrienceRequest;
use App\Http\Requests\StoreWorkExpenrienceRequest;
use App\Http\Requests\UpdateWorkExpenrienceRequest;
use App\Models\Applicant;
use App\Models\WorkExpenrience;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkExpenriencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_expenrience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workExpenriences = WorkExpenrience::with(['applicant'])->get();

        return view('admin.workExpenriences.index', compact('workExpenriences'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_expenrience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.workExpenriences.create', compact('applicants'));
    }

    public function store(StoreWorkExpenrienceRequest $request)
    {
        $workExpenrience = WorkExpenrience::create($request->all());

        return redirect()->route('admin.work-expenriences.index');
    }

    public function edit(WorkExpenrience $workExpenrience)
    {
        abort_if(Gate::denies('work_expenrience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workExpenrience->load('applicant');

        return view('admin.workExpenriences.edit', compact('applicants', 'workExpenrience'));
    }

    public function update(UpdateWorkExpenrienceRequest $request, WorkExpenrience $workExpenrience)
    {
        $workExpenrience->update($request->all());

        return redirect()->route('admin.work-expenriences.index');
    }

    public function show(WorkExpenrience $workExpenrience)
    {
        abort_if(Gate::denies('work_expenrience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workExpenrience->load('applicant');

        return view('admin.workExpenriences.show', compact('workExpenrience'));
    }

    public function destroy(WorkExpenrience $workExpenrience)
    {
        abort_if(Gate::denies('work_expenrience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workExpenrience->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkExpenrienceRequest $request)
    {
        $workExpenriences = WorkExpenrience::find(request('ids'));

        foreach ($workExpenriences as $workExpenrience) {
            $workExpenrience->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
