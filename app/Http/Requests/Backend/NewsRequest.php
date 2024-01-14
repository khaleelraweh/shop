<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                    'name'                  =>  'required|max:255', 
                    'description'           =>  'nullable',
                    'status'                =>  'required',
                    'published_on'          =>  'nullable',
                    'tags.*'                =>  'required',
                    'images'                =>  'required',  
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
                    'created_by'            =>  'nullable',
                    'updated_by'            =>  'nullable',
                    'deleted_by'            =>  'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'                  => 'required|max:255|unique:news,name,'.$this->route()->news->id,
                    'description'           =>  'nullable',
                    'status'                =>  'required',
                    'published_on'          =>  'nullable',
                    'tags.*'                =>  'required',
                    'images'                =>  'nullable',
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
                    'created_by'            =>  'nullable',
                    'updated_by'            =>  'nullable',
                    'deleted_by'            =>  'nullable',
                ];
            }
            
            default: break;
                
        }
    }
}
