<?php

namespace App\Http\Requests;

use App\Models\CustomerComplain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerComplainRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_complain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_complains,id',
        ];
    }
}
