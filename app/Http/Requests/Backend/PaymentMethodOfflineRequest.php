<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodOfflineRequest extends FormRequest
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
                    'method_name'                  =>  'required|max:255', 
                    'method_description'           =>  'nullable',
                    'payment_category_id'          =>  'required',

                    'owner_account_name'           =>  'nullable',
                    'owner_account_number'         =>  'nullable',
                    'owner_account_country'        =>  'nullable',
                    'owner_account_phone'          =>  'nullable',
                    
                    'customer_account_name'        =>  'nullable',
                    'customer_account_number'      =>  'nullable',
                    'customer_account_country'     =>  'nullable',
                    'customer_account_phone'       =>  'nullable',

                    'images'                =>  'required',  
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',

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
                    'method_name'                  =>  'required|max:255', 
                    'method_description'           =>  'nullable',
                    'payment_category_id'          =>  'required',

                    'owner_account_name'           =>  'nullable',
                    'owner_account_number'         =>  'nullable',
                    'owner_account_country'        =>  'nullable',
                    'owner_account_phone'          =>  'nullable',
                    
                    'customer_account_name'        =>  'nullable',
                    'customer_account_number'      =>  'nullable',
                    'customer_account_country'     =>  'nullable',
                    'customer_account_phone'       =>  'nullable',

                    'images'                =>  'nullable',  
                    'images.*'              =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',

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
