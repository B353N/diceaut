<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::factory()
            ->count(25)
            ->create();

        Booking::factory()
            ->count(83)
            ->create();

        Booking::factory()
            ->count(55)
            ->create();
    }
}
