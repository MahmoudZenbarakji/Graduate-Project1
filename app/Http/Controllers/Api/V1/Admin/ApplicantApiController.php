<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Http\Resources\Admin\ApplicantResource;
use App\Models\Applicant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicantApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('applicant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicantResource(Applicant::with(['user', 'salary', 'nationality', 'skills', 'job_types'])->get());
    }

    public function store(StoreApplicantRequest $request)
    {
        $applicant = Applicant::create($request->all());
        $applicant->skills()->sync($request->input('skills', []));
        $applicant->job_types()->sync($request->input('job_types', []));
        if ($request->input('image', false)) {
            $applicant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ApplicantResource($applicant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicantResource($applicant->load(['user', 'salary', 'nationality', 'skills', 'job_types']));
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

        return (new ApplicantResource($applicant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
