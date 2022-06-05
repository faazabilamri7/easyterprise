<?php

namespace App\Http\Requests;

use App\Models\NotesVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotesVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notes_vendor_create');
    }

    public function rules()
    {
        return [
            'vendor_id' => [
                'required',
                'integer',
            ],
            'note' => [
                'required',
            ],
        ];
    }
}
