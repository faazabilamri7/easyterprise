<?php

namespace App\Http\Requests;

use App\Models\JurnalUmum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJurnalUmumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jurnal_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jurnal_umums,id',
        ];
    }
}
