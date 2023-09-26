<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dt = $this->faker->dateTimeBetween('-3 week', '+3 week');
        $data = $dt->format('d-m-Y');
        return [
            'day' => $data,
            'hour' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'phone' => $this->faker->numberBetween('0877000000', '0899000000'),
            'car_plate' => $this->faker->numberBetween(1111, 9999),
            'service' => $this->faker->randomElement(['GTP', 'Diagnostig', 'Repeir']),
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}
