<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('transaction_create'),
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
            'account_id' => [
                'integer',
                'exists:accounts,id',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'data' => [
                'string',
                'nullable',
            ],
            'response' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Transaction::STATUS_SELECT)),
            ],
        ];
    }
}
