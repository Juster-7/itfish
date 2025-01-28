<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class bonusesWriteOffRequest extends FormRequest
{
    public function authorize() {
        return Auth()->user();
    }

    public function rules() {
        return [
            'amount' => 'required|decimal:0,2|gt:0|lte:amount_available',
            'amount_available' => 'required|numeric',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

	public function messages() {
        return [
			'amount:required' => 'Введите количество бонусов',
        ];
    }
}
