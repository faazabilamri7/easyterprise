<?php

namespace App\Http\Requests;

use App\Models\CustomerComplain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerComplainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_complain_create');
    }

    public function rules()
    {
        return [];
    }
}
