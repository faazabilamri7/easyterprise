<?php

namespace App\Http\Requests;

use App\Models\StokMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStokMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stok_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stok_materials,id',
        ];
    }
}
