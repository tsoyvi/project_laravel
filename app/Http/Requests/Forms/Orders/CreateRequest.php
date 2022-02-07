<?php

namespace App\Http\Requests\Forms\Orders;

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
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'phone' => ['required', 'string', 'min:1', 'max:50'],
            'email' => 'email:rfc,dns',
            'comment' => ['required', 'string', 'min:1']
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
            'phone' => 'Телефон',
            'email' => 'email',
            'comment' => 'Комментарий',
        ];
    }
}
