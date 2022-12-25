<?php

namespace App\Http\Requests\User;

use App\Rules\CheckCapster;
use App\Rules\CheckScheduleCapster;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_date' => ['required', 'date', 'after_or_equal:today'],
            'order_time' => ['required', 'date_format:H:i'],
            'capster_id' => ['required', new CheckScheduleCapster($this->barber), new CheckCapster($this->barber)]
        ];
    }
}
