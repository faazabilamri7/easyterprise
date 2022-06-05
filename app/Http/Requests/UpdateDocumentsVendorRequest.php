<?php

namespace App\Http\Requests;

use App\Models\DocumentsVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocumentsVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('documents_vendor_edit');
    }

    public function rules()
    {
        return [
            'vendor_id' => [
                'required',
                'integer',
            ],
            'document_file' => [
                'required',
            ],
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
