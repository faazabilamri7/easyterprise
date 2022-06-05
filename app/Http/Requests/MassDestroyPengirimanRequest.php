<?php

namespace App\Http\Requests;

use App\Models\Pengiriman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPengirimanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengiriman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pengirimen,id',
        ];
    }
}
