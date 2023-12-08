<?php

namespace App\Http\Requests;

use App\Models\Subscription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('subscription_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'plan_type' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Subscription::STATUS_SELECT)),
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
