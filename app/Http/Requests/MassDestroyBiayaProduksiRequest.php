<?php

namespace App\Http\Requests;

use App\Models\BiayaProduksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBiayaProduksiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('biaya_produksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:biaya_produksis,id',
        ];
    }
}
