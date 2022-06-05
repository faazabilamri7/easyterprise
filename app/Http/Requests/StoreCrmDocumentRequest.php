<?php

namespace App\Http\Requests;

use App\Models\CrmDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_document_create');
    }

    public function rules()
    {
        return [
            'customer_id' => [
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
