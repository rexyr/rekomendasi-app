<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;

class CapsterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $photo = $this->method() == "POST" ? 'required' : 'nullable';

        return [
            'name' => ['required'],
            'age' => ['required', 'integer'],
            'photo' => [$photo, 'mimes:png,jpg,jpeg']
        ];
    }
}
