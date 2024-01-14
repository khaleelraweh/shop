<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class CardRequest extends FormRequest
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
                    'quantity'              =>  'nullable|numeric',


                    'price' => 'required|integer|min:1|digits_between: 1,5',
                    'offer_price' => 'nullable|integer|lte:price|digits_between:1,5',

                    // 'offer_price' => 'required_with:price|integer|lte:price|digits_between:1,5',


                    'offer_ends'            =>  'nullable|date_format:Y-m-d',
                    'sku'                   =>  'nullable',
                    // 'max_order'             =>  'nullable|numeric',
                    'product_category_id'   =>  'required',
                    'tags.*'                =>  'required',
                    'featured'              =>  'required',
                    'images'                =>  'required',  
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
                    'views'                 =>  'nullable',// عدد مرات العرض

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
                    'name'                  =>  'required|max:255', 
                    'description'           =>  'nullable',
                    'quantity'              =>  'nullable|numeric',

                    'price' => 'required|integer|min:1|digits_between: 1,5',
                    'offer_price' => 'nullable|integer|lte:price|digits_between:1,5',

                    'offer_ends'            =>  'nullable|date_format:Y-m-d',
                    'sku'                   =>  'nullable',
                    'max_order' => 'nullable|numeric',
                    'product_category_id'   =>  'required',
                    'tags.*'                =>  'required', 
                    'featured'              =>  'required',
                    'images'                =>  'nullable',
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',
                    'views'                 =>  'nullable', // عدد مرات العرض

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


    public function messages()
         {
     // use trans instead on Lang 
             return [
                //   'username.required' => Lang::get('userpasschange.usernamerequired'),
                     'images.required' => 'مطلوب اختيار صورة',
         
             ];
         }
}
