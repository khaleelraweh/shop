<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PaymentCategoryRequest extends FormRequest
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
                    'name_ar'          =>'required|max:255|unique:payment_categories',
                    'name_en'          =>'required|max:255|unique:payment_categories',
                    'description_ar'   =>  'required',
                    'description_en'   =>  'required',
                    'images'        =>  'nullable',  
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
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
                    'name_ar'          =>  'required|max:255|unique:payment_categories,name_ar,'.$this->route()->payment_category->id,
                    'name_en'          =>  'required|max:255|unique:payment_categories,name_en,'.$this->route()->payment_category->id,
                    'description_ar'   =>  'required',
                    'description_en'   =>  'required',
                    'images'        =>  'nullable',  
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
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
            
            default: break;
                
        }
    }
}
