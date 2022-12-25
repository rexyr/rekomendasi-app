<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Capster;
use App\Models\Facility;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => User::ROLE_ADMIN,
            'name' => 'Admin'
        ]);

        User::factory()->create([
            'email' => 'user@user.com',
        ]);

        // $barber = Barber::factory()->for($owner)->create();

        // Capster::factory()->for($barber)->count(rand(3, 6))->create()
        //     ->each(function ($capster) use ($barber) {
        //         Order::factory()->for($barber)->for($capster)->count(rand(1, 3))->create();
        //     });
        // Service::factory()->count(rand(3, 5))->for($barber)->create();
        // Facility::factory()->count(rand(3, 5))->for($barber)->create();

        $this->call(CafeSeeder::class);
    }
}
