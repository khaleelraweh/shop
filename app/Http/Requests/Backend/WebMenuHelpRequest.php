<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class WebMenuHelpRequest extends FormRequest
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
                    'name_ar'       =>  'required|max:255|unique:web_menus',
                    'name_en'       =>  'required|max:255|unique:web_menus',
                    'link'          =>  'nullable',
                    'section'       =>  'nullable',


                    // used always 
                    'status'             =>  'required',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
                    'created_by'         =>  'nullable',
                    'updated_by'         =>  'nullable',
                    'deleted_by'         =>  'nullable',
                    // end of used always 
                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [ 
                    'name_ar'          =>   'required|max:255|unique:web_menus,name_ar,'.$this->route()->web_menu_help->id,
                    'name_en'          =>   'required|max:255|unique:web_menus,name_en,'.$this->route()->web_menu_help->id,
                    'link'              =>  'nullable',
                    'section'           =>  'nullable',


                    // used always 
                    'status'             =>  'required',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
                    'created_by'         =>  'nullable',
                    'updated_by'         =>  'nullable',
                    'deleted_by'         =>  'nullable',
                    // end of used always 

                    
                    
                ];
            }
            
            default: break;
                
        }
    }
}