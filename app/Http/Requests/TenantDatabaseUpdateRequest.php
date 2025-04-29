<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantDatabaseUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'db_name' => 'required',
            'db_username' => 'required',
            'db_password' => 'required',
            'db_host' => 'required',
            'db_port' => 'required',
            'db_type' => 'required'
        ];
    }

    function messages()
    {
        return [
            'db_name.required' => trans('validation.db_name_required'),
            'db_username.required' => trans('validation.db_username_required'),
            'db_password.required' => trans('validation.db_password_required'),
            'db_host.required' => trans('validation.db_host_required'),
            'db_port.required' => trans('validation.db_port_required'),
            'db_type.required' => trans('validation.db_type_required'),
        ];
    }
}
