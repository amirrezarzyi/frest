<?php

namespace App\Http\Requests\Admin\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('POST'))
        {
            return [
                'name' => 'required|unique:permissions,name',
                'title' => 'required|required|unique:permissions,title',
                'parent_id' => 'required|exists:permissions,id',
                'system_id' => 'required|exists:sub_systems,id',
            ];
        } else { 
            return [
                'name' => 'unique:roles,name,'.$this->permission->id,
                'title' => 'required|required|unique:permissions,title,'.$this->permission->id,
                'parent_id' => 'required|exists:permissions,id',
                'system_id' => 'required|exists:sub_systems,id',
            ];
        }
    }
}
