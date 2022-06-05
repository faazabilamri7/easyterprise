<?php

namespace App\Http\Requests;

use App\Models\BukuBesar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBukuBesarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('buku_besar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:buku_besars,id',
        ];
    }
}
