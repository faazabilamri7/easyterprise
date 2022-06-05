<?php

namespace App\Http\Requests;

use App\Models\KasBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKasBankRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kas_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kas_banks,id',
        ];
    }
}
