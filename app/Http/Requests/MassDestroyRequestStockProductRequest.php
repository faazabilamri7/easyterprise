<?php

namespace App\Http\Requests;

use App\Models\RequestStockProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRequestStockProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('request_stock_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:request_stock_products,id',
        ];
    }
}
