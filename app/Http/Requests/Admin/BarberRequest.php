<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BarberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'digits_between:12,13'],
            'username' => ['required', 'unique:users'],
            'barber_name' => ['required'],
            'price' => ['required', 'integer'],
            'address' => ['required'],
            'photo' => ['required', 'file', 'mimes:jpg,png,jpeg']
        ];
    }
}
