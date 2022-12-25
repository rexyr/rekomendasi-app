<?php

namespace App\Rules;

use App\Models\Barber;
use Illuminate\Contracts\Validation\Rule;

class CheckCapster implements Rule
{
    public $barber;

    public function __construct(Barber $barber)
    {
        $this->barber = $barber->load('capsters');
    }

    public function passes($attribute, $value)
    {
        $capster = $this->barber->capsters()->find($value);

        return $capster ? true : false;
    }

    public function message()
    {
        return 'Capster not belong to this barber.';
    }
}
