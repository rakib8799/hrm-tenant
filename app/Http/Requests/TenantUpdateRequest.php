<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'domain' => 'nullable',
            'workspace' => 'required',
            'allowed_domains' => 'nullable|json'
        ];
    }

    function messages()
    {
        return [
            'name.required' => trans('validation.name_required'),
            'workspace.required' => trans('validation.workspace_required'),
            'allowed_domains.json' => trans('validation.allowed_domains_json')
        ];
    }
}
