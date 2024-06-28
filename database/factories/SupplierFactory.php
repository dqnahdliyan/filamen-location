<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'province_id' => $province_id = Province::inRandomOrder()->first()->code,
            'city_id' => $city_id = City::where('province_id', $province_id)->inRandomOrder()->first()->code,
            'district_id' => $district_id = District::where('city_id', $city_id)->inRandomOrder()->first()->code,
            'village_id' => Village::where('district_id', $district_id)->inRandomOrder()->first()->code,
            'remarks' => fake()->sentence(),
        ];
    }
}
