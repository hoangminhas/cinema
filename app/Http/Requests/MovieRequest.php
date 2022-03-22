<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name'=>'required',
            'duration'=>'required',
            'summary'=>'required',
            // 'date'=>'required',
            'category' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'Vui Long Nhap Ten Phim',
            'duration.required'=>'Vui Long Nhap Thoi Luong Phim',
            'summary.required'=>'Vui Long Nhap Tom Tat Phim',
            // 'date.required'=>'Vui Long Chon Ngay',
            'category.required'=>'Vui Long Chon The Loai',
        ];
    }
}
