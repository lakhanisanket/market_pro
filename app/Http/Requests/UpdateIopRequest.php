<?php

namespace App\Http\Requests;

use App\Models\Iop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIopRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('iop_edit'),
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
            'country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
            'isp' => [
                'string',
                'nullable',
            ],
            'port' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Iop::STATUS_SELECT)),
            ],
        ];
    }
}
