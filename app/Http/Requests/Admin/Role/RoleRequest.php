<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                'name' => 'required|unique:roles,name',
                'title' => 'required|required|unique:roles,title',
                'parent_id' => 'required|exists:roles,id',
                'system_id' => 'required|exists:sub_systems,id',
                'permission.*' => 'exists:permissions,id'
            ];
        }  else {
            return [
                'name' => 'unique:roles,name,'.$this->role->id,
                'title' => 'required|required|unique:roles,title,'.$this->role->id,
                'parent_id' => 'required|exists:roles,id',
                'system_id' => 'required|exists:sub_systems,id',
                'permission.*' => 'exists:permissions,id' 
            ]; 
        }
    }

    public function attributes()
    {
        return [
            'parent_id' => 'گروه والد', 
            'name' => 'کلید', 
        ];
    }
}
