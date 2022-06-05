<?php

namespace App\Http\Requests;

use App\Models\DocumentsVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentsVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documents_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documents_vendors,id',
        ];
    }
}
