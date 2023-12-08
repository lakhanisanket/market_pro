<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Http\Resources\Admin\SubscriptionResource;
use App\Models\Subscription;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionApiController extends Controller
{
    public function subscriptionCreate(Request $request)
    {
        Subscription::create([
            "user_id" => auth()->id(),
            "plan_type" => $request->plan_type,
            "amount" => $request->amount,
            'start_date'    => $request->start_date,
            "end_date" => $request->end_date,
            'status'  => $request->status,
        ]);

        return response()->json([
            "is_success" => true,
            "messages" => "Created Successfully",
        ]);
    }

    public function subscriptionEdit(Request $request)
    {
        $subscriptionEdit = Subscription::find($request->id);

        $subscriptionEdit->update([
            "plan_type" => $request->plan_type ?? "",
            "amount" => $request->amount ?? "",
            'start_date'    => $request->start_date ?? "",
            "end_date" => $request->end_date ?? "",
            'status'  => $request->status ?? "",
        ]);

        return response()->json([
            "is_success" => true,
            "messages" => "Updated Successfully",
        ]);
    }

    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptionResource(Subscription::with(['user'])->get());
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->validated());

        return (new SubscriptionResource($subscription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptionResource($subscription->load(['user']));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->validated());

        return (new SubscriptionResource($subscription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
