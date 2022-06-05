<?php

namespace App\Http\Requests;

use App\Models\NotesVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNotesVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('notes_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:notes_vendors,id',
        ];
    }
}
