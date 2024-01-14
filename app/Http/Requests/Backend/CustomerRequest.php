<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'username'   => 'required|max:20|unique:users',
                    'email'      => 'required|email|max:255|unique:users',
                    'mobile'     => 'required|numeric|unique:users',
                    'password'   => 'nullable|min:8',
                    'status'     => 'required',
                    'user_image' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:20000',
                    
                    'created_by' => 'nullable',
                    'updated_by' => 'nullable',
                    'deleted_by' => 'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'username'   => 'required|max:20|unique:users,username,'.$this->route()->customer->id,
                    'email'      => 'required|email|max:255|unique:users,email,'.$this->route()->customer->id,
                    'mobile'     => 'required|numeric|unique:users,mobile,'.$this->route()->customer->id,
                    'password'   => 'nullable|min:8',
                    'status'     => 'required',
                    'user_image' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:20000',
                    
                    'created_by' => 'nullable',
                    'updated_by' => 'nullable',
                    'deleted_by' => 'nullable',
                ];
            }
            
            default: break;
                
        }
    }
}
