<?php

namespace App\Http\Requests;

use App\Models\VendorStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVendorStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vendor_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vendor_statuses,id',
        ];
    }
}
