<?php

namespace App\Http\Requests;

use App\Models\PurchasReq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchasReqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchas_req_edit');
    }

    public function rules()
    {
        return [
            'id_list_of_material' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_purchase_requisition' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
