<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' =>'required|integer|exists:products,id',
            'photo' =>'required|image', 
            'is_default'=> 'required|boolean' 
            // 'is_default' => 'in:1,0',
        ];
    }
}
