<?php

namespace App\Http\Requests\Forms\Feedbacks;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:200'],
            'comment' => ['required', 'string', 'min:5'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'comment' => 'Комментарий',
        ];
    }
}
