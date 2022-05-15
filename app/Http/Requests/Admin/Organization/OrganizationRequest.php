<?php

namespace App\Http\Requests\Admin\Organization;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
        $x = request()->parent_id == 0 ? '' : 'exists:organizations,id';
        if ($this->isMethod('post')){
            return [
                'title' => 'required|min:2|max:100',
                'parent_id' => 'required|'.$x,
                'national_code' => 'required|digits:12|unique:organizations,national_code',
                'manager_id' => 'required|nullable|exists:users,id', 
                'email' => 'nullable|email|max:100',
                'phone' => 'required|digits:11',
                'address' => 'required|min:2|max:250',
                'fax' => 'required|digits:11',
                'website' => 'nullable|min:2|max:100',
                'logo' => 'image|mimes:png,jpg,jpeg,svg',
                'role.*' => 'exists:roles,id'
            ];
        } else {
            return [
                'title' => 'required|min:2|max:100',
                'parent_id' => 'required|'.$x,
                'national_code' => 'required|digits:12|unique:organizations,national_code,'.$this->organization->id,
                'manager_id' => 'required|nullable|exists:users,id' , 
                'email' => 'nullable|email|max:100',
                'phone' => 'required|digits:11',
                'address' => 'required|min:2|max:250',
                'fax' => 'required|digits:11',
                'website' => 'nullable|min:2|max:100',
                'logo' => 'image|mimes:png,jpg,jpeg,svg',
                'role.*' => 'exists:roles,id'
            ];
        }
    }

    public function attributes()
    {
        return [
            'title' => 'نام'
        ];
    }
}
