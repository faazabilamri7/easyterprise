<?php

namespace App\Http\Requests;

use App\Models\PurchasReq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchasReqRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchas_req_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchas_reqs,id',
        ];
    }
}
