<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class createArticle extends FormRequest
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
            'title'=>[
                'required',
                'min:6',
                'unique:articles'
            ],
            'content' => [
                'required'
            ]
        ];
    }

    public function attributes(){
        return [
            'title' => 'tiêu đề'
        ];
    }

    public function messages(){
        return [
            'required' => 'Bố kiểm tra lại cái :attribute hộ con xem nào?'
        ];
    }

    
}
