<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\Admin\OptionResource;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OptionApiController extends Controller
{
    use MediaUploadTrait;

    public function optionCreateEdit(Request $request)
    {
        Option::updateOrCreate(
            [
                'id' => $request->id,
                'user_id' => auth()->id()
            ],
            [
                'user_id' => auth()->id(),
                'key' => $request->key,
                'value' => $request->value,
                'status' => $request->status,
            ]
        );

        return response()->json([
            "is_success" => true,
            "messages" => "Successfully",
        ]);
    }

    public function index()
    {
        abort_if(Gate::denies('option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource(Option::with(['user'])->get());
    }

    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->validated());

        if ($request->input('option_file', false)) {
            $option->addMedia(storage_path('tmp/uploads/' . basename($request->input('option_file'))))->toMediaCollection('option_file');
        }

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Option $option)
    {
        abort_if(Gate::denies('option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource($option->load(['user']));
    }

    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->validated());

        if ($request->input('option_file', false)) {
            if (!$option->option_file || $request->input('option_file') !== $option->option_file->file_name) {
                if ($option->option_file) {
                    $option->option_file->delete();
                }
                $option->addMedia(storage_path('tmp/uploads/' . basename($request->input('option_file'))))->toMediaCollection('option_file');
            }
        } elseif ($option->option_file) {
            $option->option_file->delete();
        }

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Option $option)
    {
        abort_if(Gate::denies('option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
