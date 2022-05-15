<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'username' => 'required|numeric|digits:10|unique:users,username',
                'email' => 'required|email|max:50|unique:users,email',
                'password' => 'required|confirmed',[Password::min(8)],
                'first_name' => 'required|min:2|max:30',
                'last_name' => 'required|min:2|max:30',
                'mobile' => 'required|digits:11|numeric|unique:users,mobile',
                'address' => 'nullable|min:2|max:400',
                'avatar' => 'image|mimes:png,jpg,jpeg,svg',
                'organization_id' => 'required|exists:organizations,id',
                'role.*' => 'exists:roles,id'
            ];
        }else{
            return [
                'username' => 'required|digits:10|unique:users,username,'.$this->user->id,
                'email' => 'required|email|max:50|unique:users,email,'.$this->user->id,
                'password' => ['nullable',Password::min(8),'confirmed'],
                'first_name' => 'required|min:2|max:30',
                'last_name' => 'required|min:2|max:30',
                'mobile' => 'required|digits:11|unique:users,mobile,'.$this->user->id,
                'address' => 'nullable|min:2|max:400',
                'avatar' => 'image|mimes:png,jpg,jpeg,svg',
                'organization_id' => 'required|exists:organizations,id',
                'role.*' => 'exists:roles,id'
            ];
        }
    }
}
