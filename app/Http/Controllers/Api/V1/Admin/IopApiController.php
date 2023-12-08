<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIopRequest;
use App\Http\Requests\UpdateIopRequest;
use App\Http\Resources\Admin\IopResource;
use App\Models\Iop;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IopApiController extends Controller
{
    public function iopsGet()
    {
        $iops = Iop::with(['country'])->get();

        return response()->json([
            'success' => true,
            'Iops' => $iops,
        ]);
    }

    public function index()
    {
        abort_if(Gate::denies('iop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IopResource(Iop::with(['country'])->get());
    }

    public function store(StoreIopRequest $request)
    {
        $iop = Iop::create($request->validated());

        return (new IopResource($iop))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Iop $iop)
    {
        abort_if(Gate::denies('iop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IopResource($iop->load(['country']));
    }

    public function update(UpdateIopRequest $request, Iop $iop)
    {
        $iop->update($request->validated());

        return (new IopResource($iop))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Iop $iop)
    {
        abort_if(Gate::denies('iop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iop->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
