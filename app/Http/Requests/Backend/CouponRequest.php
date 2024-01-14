<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                'code'          => 'required|unique:coupons',
                'type'          => 'required',
                'value'         => 'required',
                'description'   => 'nullable',
                'use_times'     => 'required|numeric',
                'start_date'    => 'nullable|date_format:Y-m-d',
                'expire_date'   => 'required_with:start_date|date|date_format:Y-m-d',
                'greater_than'  => 'nullable|numeric',
                
                // used always 
                'status'             =>  'required',
                'featured'           =>  'nullable',
                'published_on'       =>  'nullable',
                'published_on_time'  =>  'nullable',
                'view_in_main'       =>  'nullable',
                'views'              =>  'nullable',
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
                    'code'          => 'required|max:255|unique:coupons,code,'.$this->route()->coupon->id,
                    'type'          => 'required',
                    'value'         => 'required',
                    'description'   => 'nullable',
                    'use_times'     => 'required|numeric',
                    'start_date'    => 'nullable|date_format:Y-m-d',
                    'expire_date'   => 'required_with:start_date|date|date_format:Y-m-d',
                    'greater_than'  => 'nullable|numeric',
                    
                    // used always 
                    'status'             =>  'required',
                    'featured'           =>  'nullable',
                    'published_on'       =>  'nullable',
                    'published_on_time'  =>  'nullable',
                    'view_in_main'       =>  'nullable',
                    'views'              =>  'nullable',
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
