<?php

namespace App\Http\Requests;

use App\Models\AssetStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_statuses,id',
        ];
    }
}
