<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Applicant;
use App\Models\Education;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EducationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educations = Education::with(['applicant'])->get();

        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        abort_if(Gate::denies('education_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.educations.create', compact('applicants'));
    }

    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->all());

        return redirect()->route('admin.educations.index');
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('education_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education->load('applicant');

        return view('admin.educations.edit', compact('applicants', 'education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());

        return redirect()->route('admin.educations.index');
    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('education_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('applicant');

        return view('admin.educations.show', compact('education'));
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('education_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->delete();

        return back();
    }

    public function massDestroy(MassDestroyEducationRequest $request)
    {
        $educations = Education::find(request('ids'));

        foreach ($educations as $education) {
            $education->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
