<?php

namespace Database\Factories;

use App\Models\Barber;
use App\Models\Capster;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        $date = Carbon::now()->addDays(rand(0, 10));

        return [
            'user_id' => User::factory(),
            'order_date' => $date->toDateString(),
            'order_time' => $date->toTimeString(),
            'status' => Order::STATUS_REVIEWED,
            'review_text' => $this->faker->text(rand(5, 10)),
            'review_star' => rand(1, 5)
        ];
    }
}
