<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkExpenrienceRequest;
use App\Http\Requests\UpdateWorkExpenrienceRequest;
use App\Http\Resources\Admin\WorkExpenrienceResource;
use App\Models\WorkExpenrience;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkExpenriencesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_expenrience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkExpenrienceResource(WorkExpenrience::with(['applicant'])->get());
    }

    public function store(StoreWorkExpenrienceRequest $request)
    {
        $workExpenrience = WorkExpenrience::create($request->all());

        return (new WorkExpenrienceResource($workExpenrience))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WorkExpenrience $workExpenrience)
    {
        abort_if(Gate::denies('work_expenrience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkExpenrienceResource($workExpenrience->load(['applicant']));
    }

    public function update(UpdateWorkExpenrienceRequest $request, WorkExpenrience $workExpenrience)
    {
        $workExpenrience->update($request->all());

        return (new WorkExpenrienceResource($workExpenrience))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WorkExpenrience $workExpenrience)
    {
        abort_if(Gate::denies('work_expenrience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workExpenrience->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
