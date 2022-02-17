<?php

namespace App\Http\Requests\Admin\Registers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PostUserRegisterRequest extends FormRequest
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

    public function prepareForValidation()
    {
            $this->merge([
                "password" => Hash::make($this->password),
            ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'username' => 'required|unique:users|email',
            'password' => 'required',
            'profile' => 'required'
        ];
    }
}
