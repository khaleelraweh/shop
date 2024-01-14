<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisorSliderRequest extends FormRequest
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
                    'title'         =>  'required|max:255|unique:sliders', 
                    'content'       =>  'nullable',  
                    'url'           =>  'nullable', 
                    'target'        =>  'required', 
                    'section'       =>  'nullable', 
                    'showInfo'      =>  'required',
                    'images'        =>  'required',   
                    'images.*'      =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',  
                    


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
                    'title'             =>  'required|max:255|unique:sliders,title,'.$this->route()->advertisor_slider->id,
                    'content'           =>  'nullable',
                    'url'               =>  'nullable',
                    'target'            =>  'required',
                    'section'           =>  'nullable',
                    'showInfo'      =>  'required',
                    'images'            =>  'nullable',
                    'images.*'          =>  'mimes:jpg,jpeg,png,gif,webp|max:3000',

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
