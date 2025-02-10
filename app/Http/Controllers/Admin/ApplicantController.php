<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicantRequest;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;
use App\Models\JobType;
use App\Models\Nationality;
use App\Models\Salary;
use App\Models\Skill;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ApplicantController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('applicant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::with(['user', 'salary', 'nationality', 'skills', 'job_types', 'media'])->get();

        return view('admin.applicants.index', compact('applicants'));
    }

    public function create()
    {
        abort_if(Gate::denies('applicant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skill::pluck('name', 'id');

        $job_types = JobType::pluck('name', 'id');

        return view('admin.applicants.create', compact('job_types', 'nationalities', 'salaries', 'skills', 'users'));
    }

    public function store(StoreApplicantRequest $request)
    {
        $applicant = Applicant::create($request->all());
        $applicant->skills()->sync($request->input('skills', []));
        $applicant->job_types()->sync($request->input('job_types', []));
        if ($request->input('image', false)) {
            $applicant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $applicant->id]);
        }

        return redirect()->route('admin.applicants.index');
    }

    public function edit(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skill::pluck('name', 'id');

        $job_types = JobType::pluck('name', 'id');

        $applicant->load('user', 'salary', 'nationality', 'skills', 'job_types');

        return view('admin.applicants.edit', compact('applicant', 'job_types', 'nationalities', 'salaries', 'skills', 'users'));
    }

    public function update(UpdateApplicantRequest $request, Applicant $applicant)
    {
        $applicant->update($request->all());
        $applicant->skills()->sync($request->input('skills', []));
        $applicant->job_types()->sync($request->input('job_types', []));
        if ($request->input('image', false)) {
            if (! $applicant->image || $request->input('image') !== $applicant->image->file_name) {
                if ($applicant->image) {
                    $applicant->image->delete();
                }
                $applicant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($applicant->image) {
            $applicant->image->delete();
        }

        return redirect()->route('admin.applicants.index');
    }

    public function show(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicant->load('user', 'salary', 'nationality', 'skills', 'job_types');

        return view('admin.applicants.show', compact('applicant'));
    }

    public function destroy(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicant->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicantRequest $request)
    {
        $applicants = Applicant::find(request('ids'));

        foreach ($applicants as $applicant) {
            $applicant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('applicant_create') && Gate::denies('applicant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Applicant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
