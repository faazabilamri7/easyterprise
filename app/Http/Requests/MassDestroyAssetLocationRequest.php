<?php

namespace App\Http\Requests;

use App\Models\AssetLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_locations,id',
        ];
    }
}
