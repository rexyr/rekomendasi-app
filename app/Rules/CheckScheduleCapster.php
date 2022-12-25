<?php

namespace App\Rules;

use App\Models\Barber;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckScheduleCapster implements Rule
{
    public $barber;

    public $capster;

    public function __construct(Barber $barber)
    {
        $this->barber = $barber->load('capsters');
    }

    public function passes($attribute, $value)
    {
        $order = Order::query()
            ->whereBelongsTo($this->barber)
            ->where('capster_id', $value)
            ->where('status', Order::STATUS_CONFIRM)
            ->where('order_time', Carbon::parse(request('order_time'))->format('H:i:s'))
            ->whereDate('order_date', request('order_date'))
            ->exists();

        $this->capster = $this->barber->capsters->find($value);

        return $order ? false : true;
    }

    public function message()
    {
        return $this->capster->name . ' ' . request('order_time') . ' - ' . Carbon::parse(request('order_date'))->format('d-m-Y') . " is occupied.";
    }
}
