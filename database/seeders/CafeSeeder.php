<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Capster;
use App\Models\Facility;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Barber::factory()->count(6)->create()->each(function ($barber) {
        //     Capster::factory()->count(rand(3, 6))->for($barber)->create()
        //         ->each(function ($capster) use ($barber) {
        //             Order::factory()->for($barber)->for($capster)->count(rand(1, 3))->create();
        //         });
        //     Service::factory()->count(rand(3, 5))->for($barber)->create();
        //     Facility::factory()->count(rand(3, 5))->for($barber)->create();
        // });

        $cafes = [
            'Magna Coffe' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'AC',
                    'Pijat Leher'
                ],
                'price' => 40_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => 'images/barbers/1.png',
                'address' => 'Jl. Gajah Mada No.89 E, Tj. Agung Raya, Kec. Tj. Karang Tim., Kota Bandar Lampung, Lampung 35125'
            ],
            'Barisan Coffe' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'Wi-Fi',
                    'Pijat Leher'
                ],
                'price' => 30_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => 'images/barbers/2.png',
                'address' => 'Jl. Putri Balau No.4 A, Tj. Agung Raya, Kedamaian, Kota Bandar Lampung, Lampung 35128'
            ],
            'Bagi Waktu Coffe' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'Wi-Fi',
                    'Pijat Leher'
                ],
                'price' => 30_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => 'images/barbers/3.png',
                'address' => 'Jl. Letjend Alamsyah Ratu Prawira Negara No.28, Metro, Kec. Metro Pusat, Kota Metro, Lampung 34121'
            ],
            'Grow Coffe' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'barber dapat memberi saran potongan rambut sesuai bentuk muka pelanggan',
                    'Pijat Leher'
                ],
                'price' => 35_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => 'images/barbers/4.png',
                'address' => 'Jalan Dokter Susilo No.97, Pahoman, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35212'
            ],
            'Barro Space' => [
                'facilities' => [
                    'tempat menunggu',
                    'AC',
                    'Pomade'
                ],
                'price' => 25_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => 'images/barbers/5.jpg',
                'address' => 'Jl. Hos chokrominoto,dpn masjid Rabiatul Aziz'
            ]
        ];

        foreach ($cafes as $key => $value) {
            $admin = User::create([
                'name' => $key,
                'email' => Str::slug($key, '.') . '@gmail.com',
                'password' => bcrypt('password'),
                'username' => Str::slug($key, '.'),
                'role' => User::ROLE_OWNER,
                'phone' => '081234567890'
            ]);

            $cafe = Cafe::create(
                [
                    'user_id' => $admin->id,
                    'name' => $key,
                    'address' => $value['address'],
                    'open' => '08:00',
                    'close' => '17:00',
                    'price' => $value['price'],
                    'photo' => $value['photo'],
                ]
            );

            foreach ($value['facilities'] as $val) {
                $cafe->facilities()->create(['name' => $val]);
            }

            foreach ($value['treatment'] as $val) {
                $cafe->services()->create(['name' => $val]);
            }

            Capster::factory()->for($cafe)->count(rand(4, 5))->create();
        }
    }
}
